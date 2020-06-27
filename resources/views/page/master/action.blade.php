<div class="action text-center">
    @if (isset($action['update']))
    <a id="linkMenu" href="{{ route($module.'_update', ['code' => $model->{$model->getKeyName()}]) }}"
        class="btn btn-xs btn-primary">edit</a>
    @endif
    @if (isset($action['show']))
    <a id="linkMenu" href="{{ route($module.'_show',['code' => $model->{$model->getKeyName()}]) }}"
        class="btn btn-xs btn-success">show</a>
    @endif
</div>