<?php

namespace App\Mail;

use App\Entry;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class NewEntry extends Mailable implements ShouldQueue
{
    use Queueable, SerializesModels;
	/**
	 * @var Entry
	 */
	private $entry;

	/**
	 * Create a new message instance.
	 *
	 * @param Entry $entry
	 */
    public function __construct(Entry $entry)
    {
	    $this->entry = $entry;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->markdown('emails.entry.new')->with([
	        'name' => $this->entry->firstname.' '.$this->entry->lastname,
	        'imei' => $this->entry->imei,
        ])->subject('Claim your Motorola Offer');
    }
}
