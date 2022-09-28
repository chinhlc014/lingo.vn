@if(isset($schemaData))
    @foreach($schemaData as $schema)
    <script type="application/ld+json">
    {!!
        json_encode($schema, JSON_PRETTY_PRINT | JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE)
    !!}
    </script>
    @endforeach
@endif
