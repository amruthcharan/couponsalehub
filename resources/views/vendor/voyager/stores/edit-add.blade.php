@php
    $edit = !is_null($dataTypeContent->getKey());
    $add  = is_null($dataTypeContent->getKey());
@endphp

@extends('voyager::master')

@section('css')
    <meta name="csrf-token" content="{{ csrf_token() }}" xmlns="http://www.w3.org/1999/html">
    <style>
        .panel .mce-panel {
            border-left-color: #fff;
            border-right-color: #fff;
        }

        .panel .mce-toolbar,
        .panel .mce-statusbar {
            padding-left: 20px;
        }

        .panel .mce-edit-area,
        .panel .mce-edit-area iframe,
        .panel .mce-edit-area iframe html {
            padding: 0 10px;
            min-height: 350px;
        }

        .mce-content-body {
            color: #555;
            font-size: 14px;
        }

        .panel.is-fullscreen .mce-statusbar {
            position: absolute;
            bottom: 0;
            width: 100%;
            z-index: 200000;
        }

        .panel.is-fullscreen .mce-tinymce {
            height:100%;
        }

        .panel.is-fullscreen .mce-edit-area,
        .panel.is-fullscreen .mce-edit-area iframe,
        .panel.is-fullscreen .mce-edit-area iframe html {
            height: 100%;
            position: absolute;
            width: 99%;
            overflow-y: scroll;
            overflow-x: hidden;
            min-height: 100%;
        }
    </style>
@stop

@section('page_title', $edit ? 'Edit Store' : 'Add Store');

@section('page_header')
    <h1 class="page-title">
        <i class="{{ $dataType->icon }}"></i>
        {{ __('voyager::generic.'.(isset($dataTypeContent->id) ? 'edit' : 'add')).' '.$dataType->getTranslatedAttribute('display_name_singular') }}
    </h1>
@stop

@section('content')
    <div class="page-content container-fluid">
        <form id="store-form" class="form-edit-add" role="form" action="@if($edit){{ route('voyager.stores.update', $dataTypeContent->id) }}@else{{ route('voyager.stores.store') }}@endif" method="POST" enctype="multipart/form-data">
            <!-- PUT Method if we are editing -->
            @if($edit)
                {{ method_field("PUT") }}
            @endif
            {{ csrf_field() }}

            <div class="row">
                <div class="col-md-8">
                    <div class="panel">
                        <div class="panel-heading">
                            <h3 class="panel-title">Basic Fields</h3>
                            <div class="panel-actions">
                                <a class="panel-action voyager-angle-down" data-toggle="panel-collapse" aria-hidden="true"></a>
                            </div>
                        </div>
                        <div class="panel-body">
                            @php
                                $dataTypeRows = $dataType->{($edit ? 'editRows' : 'addRows' )};
                                $exclude = ['logo', 'slug', 'seo_description', 'seo_keywords', 'seo_title', 'post_belongsto_category_relationship', 'feature_image', 'top_review', 'popular_store', 'is_enabled'];
                            @endphp

                            @foreach($dataTypeRows as $row)
                                @if(!in_array($row->field, $exclude))
                                    @php
                                        $display_options = $row->details->display ?? NULL;
                                    @endphp
                                    @if (isset($row->details->formfields_custom))
                                        @include('voyager::formfields.custom.' . $row->details->formfields_custom)
                                    @else
                                        <div class="form-group @if($row->type == 'hidden') hidden @endif @if(isset($display_options->width)){{ 'col-md-' . $display_options->width }}@endif" @if(isset($display_options->id)){{ "id=$display_options->id" }}@endif>
                                            {{ $row->slugify }}
                                            <label for="name">{{ $row->getTranslatedAttribute('display_name') }}</label>
                                            @include('voyager::multilingual.input-hidden-bread-edit-add')
                                            @if($row->type == 'relationship')
                                                @include('voyager::formfields.relationship', ['options' => $row->details])
                                            @else
                                                {!! app('voyager')->formField($row, $dataType, $dataTypeContent) !!}
                                            @endif

                                            @foreach (app('voyager')->afterFormFields($row, $dataType, $dataTypeContent) as $after)
                                                {!! $after->handle($row, $dataType, $dataTypeContent) !!}
                                            @endforeach
                                        </div>
                                    @endif
                                @endif
                            @endforeach
                        </div>
                    </div>
                    <!-- Headings -->
                    @if($edit)
                        <div class="panel panel-bordered">
                            <div class="panel-heading">
                                <h3 class="panel-title">Headings</h3>
                                <div class="panel-actions">
                                    <div class="btn btn-primary" data-toggle="modal" data-target="#heading-modal">Add Heading</div>
                                    <a class="panel-action voyager-angle-down" data-toggle="panel-collapse" aria-hidden="true"></a>
                                </div>
                            </div>

                            <div class="panel-body" id="headings">
                                @php
                                    $headings = \App\Heading::whereStoreId($dataTypeContent->id)->orderBy('order')->get();
                                @endphp
                                @foreach($headings as $heading)
                                    <div class="panel">
                                        <div class="panel-heading">
                                            <h4 class="panel-title">{{ $heading->order }} - {{ $heading->title }}</h4>
                                            <div class="panel-actions">
                                                <a class="panel-action voyager-angle-down" data-toggle="collapse" data-target="#panel-{{ $heading->id }}" aria-hidden="true"></a>
                                            </div>
                                        </div>
                                        <div class="panel-collapse collapse" id="panel-{{ $heading->id }}">
                                            <div class="panel-body">
                                                <div class="col-md-9">
                                                    {{ $heading->description }}
                                                </div>
                                                <div class="col-md-3">
                                                    <div class="btn btn-warning" data-toggle="modal" data-id="{{ $heading->id }}" data-target="#edit-heading"><i class="voyager-edit"></i></div>
                                                    <div class="btn btn-danger" data-toggle="modal" data-id="{{ $heading->id }}" data-title="{{ $heading->title }}" data-target="#delete-heading"><i class="voyager-x"></i></div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                        <div class="panel panel-bordered">
                            <div class="panel-heading">
                                <h3 class="panel-title">Faq</h3>
                                <div class="panel-actions">
                                    <div class="btn btn-primary" data-toggle="modal" data-target="#faq-modal">Add Faq</div>
                                    <a class="panel-action voyager-angle-down" data-toggle="panel-collapse" aria-hidden="true"></a>
                                </div>
                            </div>

                            <div class="panel-body" id="faqs">
                                @php
                                    $faqs = \App\Faq::whereStoreId($dataTypeContent->id)->orderBy('order')->get();
                                @endphp
                                @foreach($faqs as $faq)
                                    <div class="panel">
                                        <div class="panel-heading">
                                            <h4 class="panel-title">{{ $faq->order }} - {{ $faq->question }}</h4>
                                            <div class="panel-actions">
                                                <a class="panel-action voyager-angle-down" data-toggle="collapse" data-target="#panel-faq-{{ $faq->id }}" aria-hidden="true"></a>
                                            </div>
                                        </div>
                                        <div class="panel-collapse collapse" id="panel-faq-{{ $faq->id }}">
                                            <div class="panel-body">
                                                <div class="col-md-9">
                                                    {{ $faq->answer }}
                                                </div>
                                                <div class="col-md-3">
                                                    <div class="btn btn-warning" data-toggle="modal" data-id="{{ $faq->id }}" data-target="#edit-faq"><i class="voyager-edit"></i></div>
                                                    <div class="btn btn-danger" data-toggle="modal" data-id="{{ $faq->id }}" data-question="{{ $faq->question }}" data-target="#delete-faq"><i class="voyager-x"></i></div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    @endif
                    <!-- ### SEO CONTENT ### -->
                    <div class="panel panel-bordered panel-info">
                        <div class="panel-heading">
                            <h3 class="panel-title"><i class="icon wb-search"></i> SEO Content</h3>
                            <div class="panel-actions">
                                <a class="panel-action voyager-angle-down" data-toggle="panel-collapse" aria-hidden="true"></a>
                            </div>
                        </div>
                        <div class="panel-body">
                            <div class="form-group">
                                <label for="seo_title">SEO Title</label>
                                @include('voyager::multilingual.input-hidden', [
                                    '_field_name'  => 'seo_title',
                                    '_field_trans' => 'seo_title'
                                ])
                                <input type="text" required class="form-control" name="seo_title" placeholder="SEO Title" value="{{ $dataTypeContent->seo_title ?? '' }}">
                            </div>
                            <div class="form-group">
                                <label for="meta_description">SEO Description</label>
                                @include('voyager::multilingual.input-hidden', [
                                    '_field_name'  => 'seo_description',
                                    '_field_trans' => 'seo_description'
                                ])
                                <textarea class="form-control" required name="seo_description">{{ $dataTypeContent->seo_description ?? '' }}</textarea>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <!-- ### IMAGE ### -->
                    <div class="panel panel-bordered panel-primary">
                        <div class="panel-heading">
                            <h3 class="panel-title"><i class="icon wb-image"></i> Images</h3>
                            <div class="panel-actions">
                                <a class="panel-action voyager-angle-down" data-toggle="panel-collapse" aria-hidden="true"></a>
                            </div>
                        </div>
                        <div class="panel-body">
                            <label for="logo">Logo</label>
                            @if(isset($dataTypeContent->logo))
                                <img src="{{ filter_var($dataTypeContent->logo, FILTER_VALIDATE_URL) ? $dataTypeContent->logo : Voyager::image( $dataTypeContent->logo ) }}" style="width:100%" />
                            @endif
                            <input type="file" {{$add ? 'required' : ''}} name="logo">
                            <label for="logo">Feature Image</label>
                            @if(isset($dataTypeContent->feature_image))
                                <img src="{{ filter_var($dataTypeContent->feature_image, FILTER_VALIDATE_URL) ? $dataTypeContent->feature_image : Voyager::image( $dataTypeContent->feature_image ) }}" style="width:100%" />
                            @endif
                            <input type="file" name="feature_image">
                        </div>
                    </div>

                    <!-- ### DETAILS ### -->
                    <div class="panel panel panel-bordered panel-warning" id="details">
                        <div class="panel-heading">
                            <h3 class="panel-title"><i class="icon wb-clipboard"></i> Store Details</h3>
                            <div class="panel-actions">
                                <a class="panel-action voyager-angle-down" data-toggle="panel-collapse" aria-hidden="true"></a>
                            </div>
                        </div>
                        <div class="panel-body">
                            <div class="form-group">
                                <label for="slug">Slug</label>
                                @include('voyager::multilingual.input-hidden', [
                                    '_field_name'  => 'slug',
                                    '_field_trans' => 'slug'
                                ])
                                <input type="text" required class="form-control" id="slug" name="slug"
                                    placeholder="slug"
                                    {!! isFieldSlugAutoGenerator($dataType, $dataTypeContent, "slug") !!}
                                    value="{{ $dataTypeContent->slug ?? '' }}">
                            </div>
                            <div class="form-group">
                                <label for="category_id">Category</label>
                                <select class="form-control" name="category_id">
                                    @foreach(Voyager::model('Category')::all() as $category)
                                        <option value="{{ $category->id }}"@if(isset($dataTypeContent->category_id) && $dataTypeContent->category_id == $category->id) selected="selected"@endif>{{ $category->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-check">
                                <input type="checkbox" {{ $dataTypeContent->popular_store ? "checked" : "" }} class="form-check-input" name="popular_store" id="popular_store">
                                <label class="form-check-label" for="popular_store">Popular Store</label>
                            </div>

                            <div class="form-check">
                                <input type="checkbox" {{ $dataTypeContent->top_review ? "checked" : "" }} class="form-check-input" name="top_review" id="top_review">
                                <label class="form-check-label" for="top_review">Top Review</label>
                            </div>

                            <div class="form-check">
                                <input type="checkbox" {{ $dataTypeContent->is_enabled ? "checked" : "" }} class="form-check-input" name="is_enabled" id="is_enabled">
                                <label class="form-check-label" for="is_enabled">Publish</label>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            @section('submit-buttons')
                <button type="submit" class="btn btn-primary pull-right">
                     @if($edit){{ "Update Store" }}@else {{ "Create New Store" }} @endif
                </button>
            @stop
            @yield('submit-buttons')
        </form>

        <iframe id="form_target" name="form_target" style="display:none"></iframe>
        <form id="my_form" action="{{ route('voyager.upload') }}" target="form_target" method="post"
                enctype="multipart/form-data" style="width:0;height:0;overflow:hidden">
            <input name="image" id="upload_file" type="file"
                     onchange="$('#my_form').submit();this.value='';">
            <input type="hidden" name="type_slug" id="type_slug" value="{{ $dataType->slug }}">
            {{ csrf_field() }}
        </form>
    </div>
    <div class="modal fade modal-success" id="heading-modal">
        <div class="modal-dialog">
            <div class="modal-content">

                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal"
                            aria-hidden="true">&times;</button>
                    <h4 class="modal-title"><i class="voyager-shop"></i> Add Heading</h4>
                </div>

                <div class="modal-body">
                    <form class="form-edit-add" id="add-heading">
                        <input type="hidden" value="{{ csrf_token() }}" name="_token">
                        <input type="hidden" value="{{ $dataTypeContent->id }}" name="store_id">
                    @php
                        $dataType = \TCG\Voyager\Models\DataType::whereSlug('headings')->first();
                        $dataTypeRows = $dataType->{('addRows' )};
                        $exclude = ['store_id'];
                    @endphp
                    @foreach($dataTypeRows as $row)
                        @if(!in_array($row->field, $exclude))
                            @php
                                $display_options = $row->details->display ?? NULL;
                            @endphp
                            @if (isset($row->details->formfields_custom))
                                @include('voyager::formfields.custom.' . $row->details->formfields_custom)
                            @else
                                <div class="form-group @if($row->type == 'hidden') hidden @endif @if(isset($display_options->width)){{ 'col-md-' . $display_options->width }}@endif" @if(isset($display_options->id)){{ "id=$display_options->id" }}@endif>
                                    {{ $row->slugify }}
                                    <label for="name">{{ $row->getTranslatedAttribute('display_name') }}</label>
                                    @include('voyager::multilingual.input-hidden-bread-edit-add')
                                    @if($row->type == 'relationship')
                                        @include('voyager::formfields.relationship', ['options' => $row->details])
                                    @else
                                        {!! app('voyager')->formField($row, $dataType, $dataTypeContent) !!}
                                    @endif

                                    @foreach (app('voyager')->afterFormFields($row, $dataType, $dataTypeContent) as $after)
                                        {!! $after->handle($row, $dataType, $dataTypeContent) !!}
                                    @endforeach
                                </div>
                            @endif
                        @endif
                    @endforeach
                </div>

                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
                    <button type="button" class="btn btn-danger" onclick="addHeading()">Add Heading</button>
                </div>
                </form>
            </div>
        </div>
    </div>
    <div class="modal fade modal-success" id="faq-modal">
        <div class="modal-dialog">
            <div class="modal-content">

                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal"
                            aria-hidden="true">&times;</button>
                    <h4 class="modal-title"><i class="voyager-shop"></i> Add Faq</h4>
                </div>

                <div class="modal-body">
                    <form class="form-edit-add" id="add-faq">
                        <input type="hidden" value="{{ csrf_token() }}" name="_token">
                        <input type="hidden" value="{{ $dataTypeContent->id }}" name="store_id">
                    @php
                        $dataType = \TCG\Voyager\Models\DataType::whereSlug('faqs')->first();
                        $dataTypeRows = $dataType->{('addRows' )};
                        $exclude = ['store_id'];
                    @endphp
                    @foreach($dataTypeRows as $row)
                        @if(!in_array($row->field, $exclude))
                            @php
                                $display_options = $row->details->display ?? NULL;
                            @endphp
                            @if (isset($row->details->formfields_custom))
                                @include('voyager::formfields.custom.' . $row->details->formfields_custom)
                            @else
                                <div class="form-group @if($row->type == 'hidden') hidden @endif @if(isset($display_options->width)){{ 'col-md-' . $display_options->width }}@endif" @if(isset($display_options->id)){{ "id=$display_options->id" }}@endif>
                                    {{ $row->slugify }}
                                    <label for="name">{{ $row->getTranslatedAttribute('display_name') }}</label>
                                    @include('voyager::multilingual.input-hidden-bread-edit-add')
                                    @if($row->type == 'relationship')
                                        @include('voyager::formfields.relationship', ['options' => $row->details])
                                    @else
                                        {!! app('voyager')->formField($row, $dataType, $dataTypeContent) !!}
                                    @endif

                                    @foreach (app('voyager')->afterFormFields($row, $dataType, $dataTypeContent) as $after)
                                        {!! $after->handle($row, $dataType, $dataTypeContent) !!}
                                    @endforeach
                                </div>
                            @endif
                        @endif
                    @endforeach
                </div>

                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
                    <button type="button" class="btn btn-danger" onclick="addFaq()">Add Faq</button>
                </div>
                </form>
            </div>
        </div>
    </div>
    <div class="modal fade modal-warning" id="edit-heading">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal"
                            aria-hidden="true">&times;</button>
                    <h4 class="modal-title"><i class="voyager-shop"></i> Edit Heading</h4>
                </div>

                <div class="modal-body">
                    <form class="form-edit-add" id="edit-form">
                        <input type="hidden" value="{{ csrf_token() }}" name="_token">
                        <input type="hidden" value="{{ $dataTypeContent->id }}" name="store_id">
                    @php
                        $dataType = \TCG\Voyager\Models\DataType::whereSlug('headings')->first();
                        $dataTypeRows = $dataType->{('editRows' )};
                        $exclude = ['store_id'];
                    @endphp
                    @foreach($dataTypeRows as $row)
                        @if(!in_array($row->field, $exclude))
                            @php
                                $display_options = $row->details->display ?? NULL;
                            @endphp
                            @if (isset($row->details->formfields_custom))
                                @include('voyager::formfields.custom.' . $row->details->formfields_custom)
                            @else
                                <div class="form-group @if($row->type == 'hidden') hidden @endif @if(isset($display_options->width)){{ 'col-md-' . $display_options->width }}@endif" @if(isset($display_options->id)){{ "id=$display_options->id" }}@endif>
                                    {{ $row->slugify }}
                                    <label for="name">{{ $row->getTranslatedAttribute('display_name') }}</label>
                                    @include('voyager::multilingual.input-hidden-bread-edit-add')
                                    @if($row->type == 'relationship')
                                        @include('voyager::formfields.relationship', ['options' => $row->details])
                                    @else
                                        {!! app('voyager')->formField($row, $dataType, $dataTypeContent) !!}
                                    @endif

                                    @foreach (app('voyager')->afterFormFields($row, $dataType, $dataTypeContent) as $after)
                                        {!! $after->handle($row, $dataType, $dataTypeContent) !!}
                                    @endforeach
                                </div>
                            @endif
                        @endif
                    @endforeach
                </div>

                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
                    <button type="button" class="btn btn-danger" onclick="editHeading()">Update Heading</button>
                </div>
                </form>
            </div>
        </div>
    </div>
    <div class="modal fade modal-warning" id="edit-faq">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal"
                            aria-hidden="true">&times;</button>
                    <h4 class="modal-title"><i class="voyager-shop"></i> Edit Faq</h4>
                </div>

                <div class="modal-body">
                    <form class="form-edit-add" id="edit-faq-form">
                        <input type="hidden" value="{{ csrf_token() }}" name="_token">
                        <input type="hidden" value="{{ $dataTypeContent->id }}" name="store_id">
                    @php
                        $dataType = \TCG\Voyager\Models\DataType::whereSlug('faqs')->first();
                        $dataTypeRows = $dataType->{('editRows' )};
                        $exclude = ['store_id'];
                    @endphp
                    @foreach($dataTypeRows as $row)
                        @if(!in_array($row->field, $exclude))
                            @php
                                $display_options = $row->details->display ?? NULL;
                            @endphp
                            @if (isset($row->details->formfields_custom))
                                @include('voyager::formfields.custom.' . $row->details->formfields_custom)
                            @else
                                <div class="form-group @if($row->type == 'hidden') hidden @endif @if(isset($display_options->width)){{ 'col-md-' . $display_options->width }}@endif" @if(isset($display_options->id)){{ "id=$display_options->id" }}@endif>
                                    {{ $row->slugify }}
                                    <label for="name">{{ $row->getTranslatedAttribute('display_name') }}</label>
                                    @include('voyager::multilingual.input-hidden-bread-edit-add')
                                    @if($row->type == 'relationship')
                                        @include('voyager::formfields.relationship', ['options' => $row->details])
                                    @else
                                        {!! app('voyager')->formField($row, $dataType, $dataTypeContent) !!}
                                    @endif

                                    @foreach (app('voyager')->afterFormFields($row, $dataType, $dataTypeContent) as $after)
                                        {!! $after->handle($row, $dataType, $dataTypeContent) !!}
                                    @endforeach
                                </div>
                            @endif
                        @endif
                    @endforeach
                </div>

                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
                    <button type="button" class="btn btn-danger" onclick="editFaq()">Update Faq</button>
                </div>
                </form>
            </div>
        </div>
    </div>
    <div class="modal fade modal-danger" id="delete-heading">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                    <h4 class="modal-title"><i class="voyager-warning"></i> Are you sure?</h4>
                </div>
                <div class="modal-body">
                    <h4>{{ __('voyager::generic.are_you_sure_delete') }} '<span class="confirm_delete_heading"></span>'</h4>
                </div>

                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">{{ __('voyager::generic.cancel') }}</button>
                    <button type="button" class="btn btn-danger" onclick="deleteHeading()">{{ __('voyager::generic.delete_confirm') }}</button>
                </div>
            </div>
        </div>
    </div>
    <div class="modal fade modal-danger" id="delete-faq">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                    <h4 class="modal-title"><i class="voyager-warning"></i> Are you sure?</h4>
                </div>
                <div class="modal-body">
                    <h4>{{ __('voyager::generic.are_you_sure_delete') }} '<span class="confirm_delete_faq"></span>'</h4>
                </div>

                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">{{ __('voyager::generic.cancel') }}</button>
                    <button type="button" class="btn btn-danger" onclick="deleteFaq()">Delete Faq</button>
                </div>
            </div>
        </div>
    </div>
    <div class="modal fade modal-danger" id="confirm_delete_modal">
        <div class="modal-dialog">
            <div class="modal-content">

                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal"
                            aria-hidden="true">&times;</button>
                    <h4 class="modal-title"><i class="voyager-warning"></i> {{ __('voyager::generic.are_you_sure') }}</h4>
                </div>

                <div class="modal-body">
                    <h4>{{ __('voyager::generic.are_you_sure_delete') }} '<span class="confirm_delete_name"></span>'</h4>
                </div>

                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">{{ __('voyager::generic.cancel') }}</button>
                    <button type="button" class="btn btn-danger" id="confirm_delete">{{ __('voyager::generic.delete_confirm') }}</button>
                </div>
            </div>
        </div>
    </div>
@stop

@section('javascript')
    <script>
        var params = {};
        var $file;

        function deleteHandler(tag, isMulti) {
          return function() {
            $file = $(this).siblings(tag);

            params = {
                slug:   '{{ $dataType->slug }}',
                filename:  $file.data('file-name'),
                id:     $file.data('id'),
                field:  $file.parent().data('field-name'),
                multi: isMulti,
                _token: '{{ csrf_token() }}'
            }

            $('.confirm_delete_name').text(params.filename);
            $('#confirm_delete_modal').modal('show');
          };
        }

        $('document').ready(function () {
            $('#slug').slugify();
            $('#store-form input[name=name]').keyup(function() {
                $('#slug').val($('#slug').val() + '-coupons');
            });

            $('.toggleswitch').bootstrapToggle();

            //Init datepicker for date fields if data-datepicker attribute defined
            //or if browser does not handle date inputs
            $('.form-group input[type=date]').each(function (idx, elt) {
                if (elt.type != 'date' || elt.hasAttribute('data-datepicker')) {
                    elt.type = 'text';
                    $(elt).datetimepicker($(elt).data('datepicker'));
                }
            });

            @if ($isModelTranslatable)
                $('.side-body').multilingual({"editing": true});
            @endif

            $('.side-body input[data-slug-origin]').each(function(i, el) {
                $(el).slugify();
            });

            $('.form-group').on('click', '.remove-multi-image', deleteHandler('img', true));
            $('.form-group').on('click', '.remove-single-image', deleteHandler('img', false));
            $('.form-group').on('click', '.remove-multi-file', deleteHandler('a', true));
            $('.form-group').on('click', '.remove-single-file', deleteHandler('a', false));

            $('#confirm_delete').on('click', function(){
                $.post('{{ route('voyager.'.$dataType->slug.'.media.remove') }}', params, function (response) {
                    if ( response
                        && response.data
                        && response.data.status
                        && response.data.status == 200 ) {

                        toastr.success(response.data.message);
                        $file.parent().fadeOut(300, function() { $(this).remove(); })
                    } else {
                        toastr.error("Error removing file.");
                    }
                });

                $('#confirm_delete_modal').modal('hide');
            });
            $('[data-toggle="tooltip"]').tooltip();
        });
        function deleteHeading() {
            let id = $('#delete-heading').data('id');
            let url = "/headings/" + id;
            $.ajax({
                type: "DELETE",
                url: url,
                success: function(data)
                {
                    toastr.success('Heading Deleted successfully!');
                    $('#delete-heading').modal('toggle');
                    refreshHeadings(data);
                },
                error: function(e)
                {
                    toastr.error('Something went wrong! Please try again!!');
                    $('#delete-heading').modal('toggle');
                }
            });
        }

        function deleteFaq() {
            let id = $('#delete-faq').data('id');
            let url = "/faqs/" + id;
            $.ajax({
                type: "DELETE",
                url: url,
                success: function(data)
                {
                    toastr.success('Faq Deleted successfully!');
                    $('#delete-faq').modal('toggle');
                    refreshFaqs(data);
                },
                error: function(e)
                {
                    toastr.error('Something went wrong! Please try again!!');
                    $('#delete-faq').modal('toggle');
                }
            });
        }

        function addHeading() {
            let form = $('#add-heading');
            let url = "{{ route('headings.store') }}";
            $.ajax({
                type: "POST",
                url: url,
                data: form.serialize(), // serializes the form's elements.
                success: function(data)
                {
                    form[0].reset();
                    toastr.success('Heading added successfully!');
                    $('#heading-modal').modal('toggle');
                    refreshHeadings(data);
                },
                error: function(e)
                {
                    form[0].reset();
                    toastr.error('Something went wrong! Please try again!!');
                    $('#heading-modal').modal('toggle');
                }
            });
        }

        function addFaq() {
            let form = $('#add-faq');
            let url = "{{ route('faqs.store') }}";
            $.ajax({
                type: "POST",
                url: url,
                data: form.serialize(), // serializes the form's elements.
                success: function(data)
                {
                    form[0].reset();
                    toastr.success('Faq added successfully!');
                    $('#faq-modal').modal('toggle');
                    refreshFaqs(data);
                },
                error: function(e)
                {
                    form[0].reset();
                    toastr.error('Something went wrong! Please try again!!');
                    $('#faq-modal').modal('toggle');
                }
            });
        }

        function editHeading() {
            let form = $('#edit-form');
            let id = $('#edit-form').data('id');
            let url = "/headings/" + id;
            $.ajax({
                type: "PUT",
                url: url,
                data: form.serialize(), // serializes the form's elements.
                success: function(data)
                {
                    form[0].reset();
                    toastr.success('Heading updated successfully!');
                    $('#edit-heading').modal('toggle');
                    refreshHeadings(data);
                },
                error: function(e)
                {
                    form[0].reset();
                    toastr.error('Something went wrong! Please try again!!');
                    $('#edit-heading').modal('toggle');
                }
            });
        }

        function editFaq() {
            let form = $('#edit-faq-form');
            let id = $('#edit-faq-form').data('id');
            let url = "/faqs/" + id;
            $.ajax({
                type: "PUT",
                url: url,
                data: form.serialize(), // serializes the form's elements.
                success: function(data)
                {
                    form[0].reset();
                    toastr.success('Faq updated successfully!');
                    $('#edit-faq').modal('toggle');
                    refreshFaqs(data);
                },
                error: function(e)
                {
                    form[0].reset();
                    toastr.error('Something went wrong! Please try again!!');
                    $('#edit-faq').modal('toggle');
                }
            });
        }

        $('#edit-heading').on('shown.bs.modal', function(event) {
            let id = $(event.relatedTarget).data('id');
            let url = "/headings/" + id;
            $.ajax({
                type: "GET",
                url: url,
                success: function(data)
                {
                    $('#edit-form input[name=title]').val(data.title);
                    $('#edit-form textarea[name=description]').val(data.description);
                    $('#edit-form input[name=order]').val(data.order);
                    $('#edit-form').data('id', data.id);
                },
                error: function(e)
                {
                    toastr.error('Something went wrong! Please try again!!');
                    $('#edit-heading').modal('toggle');
                }
            });
        });

        $('#edit-faq').on('shown.bs.modal', function(event) {
            let id = $(event.relatedTarget).data('id');
            let url = "/faqs/" + id;
            $.ajax({
                type: "GET",
                url: url,
                success: function(data)
                {
                    $('#edit-faq-form input[name=question]').val(data.question);
                    $('#edit-faq-form textarea[name=answer]').val(data.answer);
                    $('#edit-faq-form input[name=order]').val(data.order);
                    $('#edit-faq-form').data('id', data.id);
                },
                error: function(e)
                {
                    toastr.error('Something went wrong! Please try again!!');
                    $('#edit-faq').modal('toggle');
                }
            });
        });

        $('#delete-heading').on('shown.bs.modal', function(event) {
            $('.confirm_delete_heading').text($(event.relatedTarget).data('title'));
            $('#delete-heading').data('id', $(event.relatedTarget).data('id'));
        });

        $('#delete-faq').on('shown.bs.modal', function(event) {
            $('.confirm_delete_faq').text($(event.relatedTarget).data('question'));
            $('#delete-faq').data('id', $(event.relatedTarget).data('id'));
        });

        function refreshHeadings(data = []) {
            headings = "";
            $.each(data, function (i, v) {
                headings+= "<div class=\"panel\">\n" +
                    "<div class=\"panel-heading\">\n" +
                    "<h4 class=\"panel-title\">" + v.order + ' - ' + v.title + "</h4>\n" +
                    "<div class=\"panel-actions\">\n" +
                    "<a class=\"panel-action voyager-angle-down\" data-toggle=\"collapse\" data-target=\"#panel-"+ v.id +"\" aria-hidden=\"true\"></a>\n" +
                    "</div>\n" +
                    "</div>\n" +
                    "<div class=\"panel-collapse collapse\" id=\"panel-" + v.id + "\">\n" +
                    "<div class=\"panel-body\">\n" +
                    "<div class=\"col-md-9\">"+ (v.description || "") + "</div>" +
                    "<div class=\"col-md-3\">" +
                    "<div class=\"btn btn-warning\" data-toggle=\"modal\" data-id='" + v.id + "' data-target=\"#edit-heading\"><i class=\"voyager-edit\"></i></div>\n" +
                    "<div class=\"btn btn-danger\" data-toggle=\"modal\" data-id='" + v.id + "' data-title='" + v.title + "' data-target=\"#delete-heading\"><i class=\"voyager-x\"></i></div>\n" +
                    "</div>" +
                    "</div>\n" +
                    "</div>\n" +
                    "</div>\n";
            });
            $('#headings').html(headings);
        }
        function refreshFaqs(data = []) {
            faqs = "";
            $.each(data, function (i, v) {
                faqs+= "<div class=\"panel\">\n" +
                    "<div class=\"panel-heading\">\n" +
                    "<h4 class=\"panel-title\">" + v.order + ' - ' + v.question + "</h4>\n" +
                    "<div class=\"panel-actions\">\n" +
                    "<a class=\"panel-action voyager-angle-down\" data-toggle=\"collapse\" data-target=\"#panel-faq-"+ v.id +"\" aria-hidden=\"true\"></a>\n" +
                    "</div>\n" +
                    "</div>\n" +
                    "<div class=\"panel-collapse collapse\" id=\"panel-faq-" + v.id + "\">\n" +
                    "<div class=\"panel-body\">\n" +
                    "<div class=\"col-md-9\">"+ (v.answer || "") + "</div>" +
                    "<div class=\"col-md-3\">" +
                    "<div class=\"btn btn-warning\" data-toggle=\"modal\" data-id='" + v.id + "' data-target=\"#edit-faq\"><i class=\"voyager-edit\"></i></div>\n" +
                    "<div class=\"btn btn-danger\" data-toggle=\"modal\" data-id='" + v.id + "' data-question='" + v.question + "' data-target=\"#delete-faq\"><i class=\"voyager-x\"></i></div>\n" +
                    "</div>" +
                    "</div>\n" +
                    "</div>\n" +
                    "</div>\n";
            });
            $('#faqs').html(faqs);
        }
    </script>
@stop
