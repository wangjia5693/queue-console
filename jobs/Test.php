<?php namespace Jobs;
#队列任务需要对数据库进行操作，直接传入该model对象，能很好的进行序列化与反序列化; 所有查询构造器里的方法，查询 Eloquent 模型时也可以使用。
#注意： Eloquent 也会假设每个数据库表都有一个字段名称为 id 的主键。您可以在类里定义 primaryKey 属性来重写。同样的，您也可以定义 connection 属性，指定模型连接到指定的数据库连接。
#默认情况下，在数据库表里需要有 updated_at 和 created_at 两个字段。如果您不想设定或自动更新这两个字段;
#注意： 通常 Eloquent 模型主键值会自动递增。但是您若想自定义主键，将 incrementing 属性设成 false 。

#要从模型新增一条数据到数据库，只要建立一个模型实例并调用 save 方法即可。
#要更新模型，可以取出它，更改属性值，然后使用 save 方法
#要删除模型，只要使用实例调用 delete 方法

use Illuminate\Database\Eloquent\Model;

class Test extends Model {

    protected $table = 'user';#默认为类名小写加复数
    public $timestamps = false;
    //

}
