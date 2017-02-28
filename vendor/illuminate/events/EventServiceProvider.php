<?php namespace Illuminate\Events;

use Illuminate\Support\ServiceProvider;

class EventServiceProvider extends ServiceProvider {

	/**
	 * Register the service provider.
	 *
	 * @return void
	 */
	public function register()
	{

		$this->app->singleton('events', function($app)
		{
			//返回的是Dispatcher实例；$this->queueResolver = $app->make('Illuminate\Contracts\Queue\Queue');;
			return (new Dispatcher($app))->setQueueResolver(function() use ($app)
			{
				return $app->make('Illuminate\Contracts\Queue\Queue');
			});

		});
	}

}
