<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;
use App\Models\Option;

class AdmitCard extends Mailable
{
    use Queueable, SerializesModels;

    public $userdetails;
    public $subjects;
    public $examdetails;
    public $type;
    public $admitcardlink;
    public $body;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($userdetails,$subjects,$examdetails,$admitcardlink)
    {
        $options = new Option();
        $this->userdetails = $userdetails;
        $this->subjects=$subjects;
        $this->examdetails=$examdetails;
        $this->admitcardlink=$admitcardlink;
        $this->body= $options->get_option('admitcardtemplate');     
        $this->body= str_replace('[student_name]',$userdetails->name,$this->body);
        $this->body= str_replace('[mother_name]',$userdetails->mothername,$this->body);
        $this->body= str_replace('[father_name]',$userdetails->fathername,$this->body);
        $this->body= str_replace('[student_address]',$userdetails->caddress,$this->body);
        $this->body= str_replace('[student_dob]',$userdetails->dob,$this->body);

        // $this->body= str_replace('[exam_date]',$examdetails->exam_date,$this->body);
        // $this->body= str_replace('[exam_center]',$examdetails->exam_center,$this->body);
        // $this->body= str_replace('[exam_venue]',$examdetails->exam_venue,$this->body);
        // $this->body= str_replace('[admit_card_link]',$admitcardlink,$this->body);
    }

    /**
     * Get the message envelope.
     *
     * @return \Illuminate\Mail\Mailables\Envelope
     */
    public function envelope()
    {
        return new Envelope(
            subject: 'Admit Card Generated',
        );
    }

    /**
     * Get the message content definition.
     *
     * @return \Illuminate\Mail\Mailables\Content
     */
    public function content()
    {
        return new Content(
            markdown: 'emails.students.admitcard',
            with: [
                'body' => $this->body,
            ],
        );
    }

    /**
     * Get the attachments for the message.
     *
     * @return array
     */
    public function attachments()
    {
        return [];
    }
}
