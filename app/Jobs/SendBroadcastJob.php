<?php

namespace App\Jobs;

use App\Helpers\FChatHelper;
use App\Models\LogBroadcast;
use App\Repositories\LogBroadcastRepository;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldBeUnique;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;

class SendBroadcastJob implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    /** @var array $data */
    private array $data;

    protected LogBroadcastRepository $logBroadcastRepository;

    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct(array $data)
    {
        $this->data = $data;
        $this->logBroadcastRepository = new LogBroadcastRepository(new LogBroadcast());
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        $send = FChatHelper::sendMessageText($this->data['to'],$this->data['content'],$this->data['token_page']);
        $this->logBroadcastRepository->create([
            'user_id' => $this->data['user_id'],
            'content' => $this->data['text'],
            'response' => json_encode($send),
            'name_event' => $this->data['name_event']
        ]);
    }
}
