<?php

namespace App\Livewire\Finances\CSV;

use App\Models\Collection;
use App\Models\Contact;
use App\Models\Transaction;
use Carbon\Carbon;
use League\Csv\Exception;
use League\Csv\Reader;
use League\Csv\SyntaxError;
use League\Csv\UnavailableStream;
use Livewire\Component;
use Livewire\WithFileUploads;

class Upload extends Component
{
    use WithFileUploads;

    public $file;
    public $headers;
    public $records = [];

    public $dateTimeCol;
    public $amountCol;
    public $accountCol;
    public $messageCol;

    public $count = 0;

    public $stage = 1;


    public function updatedFile()
    {
        $this->validate([
            'file' => 'required|mimes:csv',
        ]);
        $csv = Reader::createFromPath($this->file->getRealPath(), 'r');
        $csv->setHeaderOffset(0);
        $headers = $csv->getHeader();
        if (count($headers) !== count(array_unique($headers))) {
            $this->addError('file', 'Duplicate headers found.');
            return;
        }
        $this->headers = $headers;
        $this->records = iterator_to_array($csv->getRecords());

        foreach ($this->records as &$record) {
            $record['identifier'] = hash('sha256', implode('', $record));
        }

        $this->records = array_values(array_filter($this->records, function ($record) {
            return !Transaction::where('identifier', $record['identifier'])->exists();
        }));

        if (empty($this->records)) {
            $this->addError('file', 'All records have already been imported.');
            return;
        }

        $this->stage = 2;
    }

    public function setHeaders()
    {
        $this->validate([
            'dateTimeCol' => 'required',
            'amountCol' => 'required',
            'accountCol' => 'required',
        ]);

        $this->stage = 3;
    }


    public function import()
    {
        foreach ($this->records as $record) {
            $date_time = Carbon::parse($record[$this->dateTimeCol]);
            $amount = abs(floatval(str_replace(',','.',str_replace('.','',$record[$this->amountCol]))* 100));
            if (floatval($record[$this->amountCol]) > 0) {
                $incoming_collection_id = auth()->user()->collections->where('is_general', 1)->first()->id;
                $outgoing_collection_id = null;
                if (!empty($record[$this->accountCol])) {
                    $contact = Contact::query()
                        ->where('bank_account', $record[$this->accountCol])
                        ->first();
                    if ($contact) {
                        $this->updateMonthsDonated($contact, $date_time);
                    }
                }
            } else {
                $outgoing_collection_id = Collection::first()->id;
                $incoming_collection_id = null;
            }

            Transaction::create([
                'date_time' => $date_time,
                'amount' => $amount,
                'outgoing_collection_id' => $incoming_collection_id,
                'incoming_collection_id' => $outgoing_collection_id,
                'identifier' => $record['identifier'],
                'message' => $record[$this->messageCol] ?? null,
                'is_imported' => true,
            ]);
            $this->count++;
        }

        $this->reset();
    }

    private function updateMonthsDonated(Contact $contact, Carbon $date_time)
    {
        $currentMonth = $date_time->format('Y-m');
        $monthsDonated = $contact->months_donated ? json_decode($contact->months_donated, true) : [];

        if (!in_array($currentMonth, $monthsDonated)) {
            $monthsDonated[] = $currentMonth;
        }

        $monthsDonated = array_slice($monthsDonated, -3);

        $contact->months_donated = json_encode($monthsDonated);
        $contact->save();
    }

    public function render()
    {
        return view('livewire.finances.c-s-v.upload');
    }
}
