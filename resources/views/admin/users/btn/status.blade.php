<span class="label
{{ $status == 'yes'?'label-info':'' }}
{{ $status == 'no'?'label-primary':'' }}

">

{{ trans('admin.'.$status) }}
</span>