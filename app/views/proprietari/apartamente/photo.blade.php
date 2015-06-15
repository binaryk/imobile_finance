<?php $name_ = explode('/', $record->photo); $name_ = end($name_); ?>
<img src="{{ \URL::to('../app/storage/uploads/'.$record->id.'/'. $name_) }}">