<?php namespace Illuminate\Queue;

use ReflectionClass;
use ReflectionProperty;
use Illuminate\Contracts\Queue\QueueableEntity;
use Illuminate\Contracts\Database\ModelIdentifier;

trait SerializesModels {

	/**
	 * Prepare the instance for serialization.
	 *你执行serialize()这个序列化函数之前时的事情，就像一个回调函数，所以在这个回调函数里面我们就可以做点事情，来隐藏我的秘密
	 * @return array
	 */
	public function __sleep()
	{
		$properties = (new ReflectionClass($this))->getProperties();

		foreach ($properties as $property)
		{
			$property->setValue($this, $this->getSerializedPropertyValue(
				$this->getPropertyValue($property)
			));
		}

		return array_map(function($p) { return $p->getName(); }, $properties);
	}

	/**
	 * Restore the model after serialization.
	 *至于__wakeup()和__sleep()大同小异，只不过是反序列化之前进行的回调函数
	 * @return void
	 */
	public function __wakeup()
	{
		foreach ((new ReflectionClass($this))->getProperties() as $property)
		{
			$property->setValue($this, $this->getRestoredPropertyValue(
				$this->getPropertyValue($property)
			));
		}
	}

	/**
	 * Get the property value prepared for serialization.
	 *
	 * @param  mixed  $value
	 * @return mixed
	 */
	protected function getSerializedPropertyValue($value)
	{
		return $value instanceof QueueableEntity
						? new ModelIdentifier(get_class($value), $value->getQueueableId()) : $value;
	}

	/**
	 * Get the restored property value after deserialization.
	 *
	 * @param  mixed  $value
	 * @return mixed
	 */
	protected function getRestoredPropertyValue($value)
	{


		return $value instanceof ModelIdentifier
						? (new $value->class)->findOrFail($value->id) : $value;
	}

	/**
	 * Get the property value for the given property.
	 *
	 * @param  \ReflectionProperty  $property
	 * @return mixed
	 */
	protected function getPropertyValue(ReflectionProperty $property)
	{
		$property->setAccessible(true);

		return $property->getValue($this);
	}

}
