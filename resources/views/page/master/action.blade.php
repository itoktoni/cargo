<div class="action text-center">
    @if (isset($action['update']))
    <a id="linkMenu" href="{{ route($module.'_update', ['code' => $model->{$model->getKeyName()}]) }}"
        class="btn btn-xs btn-primary">ubah</a>
    @endif
    @if (isset($action['show']))
    <a id="linkMenu" href="{{ route($module.'_show',['code' => $model->{$model->getKeyName()}]) }}"
        class="btn btn-xs btn-success">lihat</a>
    @endif
</div>