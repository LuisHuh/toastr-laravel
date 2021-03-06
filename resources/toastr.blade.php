@if(Session::has('toast'))
    <?php $toast = Session::pull('toast'); ?>
    <script type="text/javascript">
        toastr.{{ $toast['type'] }}(
            "{{ $toast['message']}}",
            "{{ $toast['title']}}",
            {
                @if (isset($toast['options']))
                    @foreach($toast['options'] as $option => $value)
                        @if (is_string($value))
                            {{ $option }} : '{!! $value !!}',
                        @elseif(is_bool($value))
                            @if ($value == 1)
                                {{ $option }} : true,
                            @else
                                {{ $option }} : false,
                            @endif
                        @else
                            {{ $option }} : {!! $value !!},
                        @endif
                    @endforeach
                @endif
            }
        );
    </script>
@endif

@if($errors->count() > 0)
    <script type="text/javascript">
        @foreach($errors->all() as $error)
            toastr.error("{!! $error !!}", null, {closeButton: true, preventDuplicates: true, timeOut: 0});
        @endforeach
    </script>
@endif
