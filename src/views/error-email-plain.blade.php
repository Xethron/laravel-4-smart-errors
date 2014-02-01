Time: {{ $time }}
URL: {{ $url }}
Route: {{ $route }}

Error message: {{ $exception->getMessage() }}<?php if ($exception->getCode() > 0) echo ' - code: '.$exception->getCode() ?>
In {{ $exception->getFile() }} on line {{ $exception->getLine() }}

Stack trace
===========
{{ \Xethron\L4ToString::exception( $exception ) }}

@if ($previous = $exception->getPrevious())
Previous exception
==================
{{ $previous->getMessage() }}<?php if ($previous->getCode() > 0) echo ' - code: '.$previous->getCode() ?>
In {{ $previous->getFile() }} on line {{ $previous->getLine() }}
@endif

@if (!empty($input))
Input
=====
@foreach($input as $key => $val)
{{ $key }}: {{ $val }}
@endforeach
@endif

@if (Config::get('smarterror::log-queries'))
MySQL Queries
=============
{{ \Xethron\L4ToString::queryLog() }}
@endif