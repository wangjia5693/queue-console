<?php namespace Jobs;

use Illuminate\Queue\SerializesModels;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Bus\SelfHandling;
use Illuminate\Contracts\Queue\ShouldBeQueued;

class SendEmail  implements SelfHandling, ShouldBeQueued {

    use InteractsWithQueue, SerializesModels;
    protected  $data;
    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct($data)
    {
        //
        $this->data = $data;
    }

    /**
     * Execute the command.
     *
     * @return void
     */
    public function handle()
    {

        if ($this->attempts() > 3) {
            //通过attempts方法来检查该任务已经尝试运行次数
        }
        $condition = false;
        if ($condition) {
            //手动释放任务
            //$this->release(10);
        }

        echo 13323555;
        var_dump($this->data);
    }

}
