<div class="form bravo_form" method="get" style='box-shadow: 0 0 0 0;'>
    <div class="g-field-search">

   
            @php $space_search_fields = setting_item_array('space_search_fields');

            @endphp
            @if(!empty($space_search_fields))


                @foreach($space_search_fields as $field)
                    @php $field['title'] = $field['title_'.app()->getLocale()] ?? $field['title'] ?? "" @endphp
                    <div style='padding-left:10px;'>
                        @switch($field['field'])
                            @case ('service_name')
                                @include('Space::frontend.layouts.search.filter_fields.service_name')
                            @break
                        @endswitch
                    </div>
                @endforeach
                @foreach($space_search_fields as $field)
                    @php $field['title'] = $field['title_'.app()->getLocale()] ?? $field['title'] ?? "" @endphp
                    <div style='padding-left:10px;'>
                        @switch($field['field'])

                            @case ('attr')
                                @include('Space::frontend.layouts.search.filter_fields.attr')
                            @break
                        @endswitch
                    </div>
                @endforeach
                @foreach($space_search_fields as $field)
                    @php $field['title'] = $field['title_'.app()->getLocale()] ?? $field['title'] ?? "" @endphp
                    <div style='padding-left:10px;'>
                        @switch($field['field'])

                            @case ('location')
                                @include('Space::frontend.layouts.search.filter_fields.location')
                            @break

                        @endswitch
                    </div>
                @endforeach
                @foreach($space_search_fields as $field)
                    @php $field['title'] = $field['title_'.app()->getLocale()] ?? $field['title'] ?? "" @endphp
                    <div style='padding-left:10px;'>
                        @switch($field['field'])

                            @case ('guests')
                                @include('Space::frontend.layouts.search.fields.guests')
                            @break
                        @endswitch
                    </div>
                @endforeach

            @endif

    </div>
    

</div>