<div class="content-header row">
    <div class="content-header-left col-md-9 col-12 mb-2">
        <div class="row breadcrumbs-top">
            <div class="col-12">
                <h2 class="content-header-title float-left mb-0">@yield('title')</h2>
                <div class="breadcrumb-wrapper col-12">
                    @if (@isset($breadcrumbs))
                        <ol class="breadcrumb">
                            {{-- this will load breadcrumbs dynamically from controller --}}
                            @foreach ($breadcrumbs as $breadcrumb)
                                <li class="breadcrumb-item">
                                    @if (isset($breadcrumb['link']))
                                        <a href="{{ $breadcrumb['link'] }}"> @endif{{ $breadcrumb['name'] }}
                                            @if (isset($breadcrumb['link'])) </a>
                                    @endif
                                </li>
                            @endforeach
                        </ol>
                    @endisset
            </div>
        </div>
    </div>
</div>
<div class="content-header-right text-md-right col-md-3 col-12 d-md-block d-none">
    <div class="form-group breadcrum-right">
        @if (isset($link))
            <a href="{{ $link }}" class="btn-icon btn btn-primary btn-round btn-sm" type="button"><i
                    class="{{ $link_icon }}"></i></a>

        @endif
    </div>
</div>
</div>
