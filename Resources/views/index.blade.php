@extends('modulemanager::layouts.master')
@section('pagetitle','مدیریت ماژول ها')
@section('bodytitle','ماژول ها')
@section('toast','مدیریت ماژول های وبسایت')
@section('content')
    @foreach(\Nwidart\Modules\Facades\Module::all() as $module)
        @if($module->getLowerName() != 'modulemanager')
            @php

                $datajson = new \Nwidart\Modules\Json($module->getPath().'\module.json');

            @endphp
            <div class="card">
                <div class="card-body">
                    <h6 class="card-title">{{ $module->getName() }}</h6>
                    <h6>{{ $datajson->get('alias') }}</h6>
                    <h6 class="card-subtitle mb-2 text-muted primary-font">@if($module->isEnabled()) فعال@else غیر
                        فعال@endif</h6>
                    <p class="card-text">{{ $datajson->get('description') }}</p>
                    @if($module->isEnabled())
                        <form class="mb-2" action="{{route('panel.modules.set')}}" method="post">
                            @csrf
                            <button name="set" value="{{$module->getLowerName()}}" class="btn btn-danger">غیر فعالسازی
                            </button>
                        </form>
                    @else
                        <form class="mb-2" action="{{route('panel.modules.set')}}" method="post">
                            @csrf
                            <button name="set" value="{{$module->getLowerName()}}" class="btn btn-success">فعالسازی
                            </button>
                        </form>
                    @endif
                    @if(\Illuminate\Support\Facades\Route::has('panel.'.$module->getLowerName()))
                        <a href="{{route('panel.'.$module->getLowerName())}}" class="btn btn-primary">تنظیمات</a>
                    @endif
                    @if(\Illuminate\Support\Facades\Route::has('panel.'.$module->getLowerName().'.docs'))
                        <a href="{{route('panel.'.$module->getLowerName().'.docs')}}" class="btn btn-dark">docs</a>
                    @endif
                </div>
            </div>
        @endif
    @endforeach
@endsection


