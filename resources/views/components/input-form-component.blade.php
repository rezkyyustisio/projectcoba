@if($type == 'color')
    <div class="col-md-{{ $col }}">
        <div class="mb-3 row">
            <label class="form-label col-md-4">{{ $title }} {!! $required ? null : '<span class="text-danger">*</span>' !!}</label>
            <div class="col-md-8">
                <input type="text" class="form-control color" name="{{ $name ?? $id }}" id="{{ $id }}" value="{{ $value }}">
            </div>
        </div>
    </div>
@elseif($type == 'text-editor')
    <div class="col-md-{{ $col }}">
        <div class="mb-3 row">
            <label class="col-md-2 col-form-label">{{ $title }} <span class="text-danger">*</span></label>
            <div class="col-md-10">
                <textarea id="{{ $id }}" name="{{ $name ?? $id }}" class="form-control"></textarea>
            </div>
        </div>
    </div>

    @push('js')
        <script>
            $(document).ready(function() {
                tinymce.init({
                    selector: "textarea#{{ $id }}",
                    height: 300,
                    plugins: [
                        "advlist autolink link image lists charmap print preview hr anchor pagebreak spellchecker table",
                    ],
                    toolbar: "insertfile undo redo | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist | table",
                    style_formats: [
                        { title: "Bold text", inline: "b" },
                        { title: "Red text", inline: "span", styles: { color: "#ff0000" } },
                        { title: "Red header", block: "h1", styles: { color: "#ff0000" } },
                        { title: "Example 1", inline: "span", classes: "example1" },
                        { title: "Example 2", inline: "span", classes: "example2" },
                        { title: "Table styles" },
                        { title: "Table row 1", selector: "tr", classes: "tablerow1" }
                    ],
                    init_instance_callback: function (editor) {
                        editor.on('change', function () {
                            description = editor.getContent();
                        });
                    }
                });
            });
        </script>
    @endpush
@elseif($type == 'drop-down')
    <div class="col-md-{{ $col }}">
        <div class="mb-3 row">
            <label class="col-md-4 col-form-label">{{ $title }} {!! $required ? null : '<span class="text-danger">*</span>' !!}</label>
            <div class="col-md-8">
                <select name="{{ $name ?? $id }}" id="{{ $id }}" class="form-control {{ $filter ? 'select-filter' : 'select2' }}" style="width: 100%;">
                    <option value="" selected hidden disabled>Pilih {{ $title }}</option>
                    {{ $slot }}
                    @foreach($options as $option)
                        <option value="{{ $option->id }}" @selected(request($name ?? 'null') == $option->id)>{{ $option->name }}</option>
                    @endforeach
                </select>
            </div>
        </div>
    </div>
@elseif($type == 'choose')
    <div class="col-md-{{ $col }}">
        <div class="mb-3 row">
            <label class="col-md-4 col-form-label">{{ $title }} {!! $required ? null : '<span class="text-danger">*</span>' !!}</label>
            <div class="col-md-8">
                <select name="{{ ($name ?? $id) . ($multiple ? '[]' : '') }}"  id="{{ $id }}"  class="form-control {{ $filter ? 'select-filter' : 'select2' }}"  style="width: 100%;"  {{ $multiple ? 'multiple' : null }}>
                    @if(!$multiple)
                        <option value="" selected hidden disabled>==Select {{ $title }}==</option>
                    @endif
                    {{ $slot }}
                </select>
            </div>
        </div>
    </div>
@else
    @if($title == 'Judul Berita')
         <div class="col-md-{{ $col }}">
            <div class="mb-3 row">
                <label for="example-text-input" class="col-md-2 col-form-label">{{ $title }} {!! $required ? null : '<span class="text-danger">*</span>' !!}</label>
                <div class="col-md-10">
                    <input 
                        type="{{ $type }}" 
                        step="{{ $step }}" 
                        class="form-control {{ $type == 'file' ? null : 'max-length' }}" 
                        @if($type != 'file') maxlength="{{ $max }}" @endif 
                        name="{{$name ?? $id }}" 
                        id="{{ $id }}" 
                        value="{{ $value }}" 
                        {{ $readonly ? 'readonly' : null }} 
                        {{ $multiple ? 'multiple' : null }}
                        {{ $attributes }}  {{-- INI YANG DITAMBAHKAN --}}
                    />
                </div>
            </div>
        </div>
    @else
        <div class="col-md-{{ $col }}">
            <div class="mb-3 row">
                <label for="example-text-input" class="col-md-4 col-form-label">{{ $title }} {!! $required ? null : '<span class="text-danger">*</span>' !!}</label>
                <div class="col-md-8">
                    <input 
                        type="{{ $type }}" 
                        step="{{ $step }}" 
                        class="form-control {{ $type == 'file' ? null : 'max-length' }}" 
                        @if($type != 'file') maxlength="{{ $max }}" @endif 
                        name="{{$name ?? $id }}" 
                        id="{{ $id }}" 
                        value="{{ $value }}" 
                        {{ $readonly ? 'readonly' : null }} 
                        {{ $multiple ? 'multiple' : null }}
                        {{ $attributes }}  {{-- INI YANG DITAMBAHKAN --}}
                    />
                </div>
            </div>
        </div>
    @endif
@endif