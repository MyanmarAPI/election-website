<table class="bordered">
    <thead>
        <tr>
            <th>Name</th>
            <th>Slug</th>
            <th>Type</th>
            <th>Status</th>
            <th>Screenshots</th>
            <th>Icon Image</th>
            <th width="380px">Actions</th>
        </tr>                   
    </thead>

    @foreach ( $apps as $app)

    <tr>
        <td>{{ $app->name }}</td>
        <td>{{ $app->slug }}</td>
        <td>{{ $app->getTypeString() }}</td>
        <td>
            @if ($app->alreadyPublished())
                <span class="green-text text-darken-2">Published</span>
            @elseif ($app->published == 'p')
                <span class="blue-text text-darken-2">Wait Admin Approve</span>
            @else
                <span class="red-text text-darken-2">Draft</span>
            @endif
        </td>
        <td>{{ count($app->screenshots) }}</td>
        <td>
            @if (is_null($app->icon))
                <i class="material-icons red-text" title="Require Icon Image">error_outline</i>
            @else
                <i class="material-icons green-text" title="Icon Image Is Ok">done</i>
            @endif
        </td>
        <td>
            <a title="Add Icon" href="{{ route('showcase.icon', $app->id) }}" 
            class="waves-effect waves-light btn indigo">
                <i class="material-icons">photo</i>
            </a>
            <a title="Add Screenshots" href="{{ route('showcase.screenshots', $app->id) }}" 
            class="waves-effect waves-light btn teal">
                <i class="material-icons">photo_library</i>
            </a>

            @if ($app->published == 'p')
                <a title="Draft" href="{{ route('showcase.draft', $app->id) }}" 
                class="waves-effect waves-light btn red">
                    <i class="material-icons">visibility_off</i>
                </a>
            @elseif ($app->readyToPublish())
                <a title="Publish" href="{{ route('showcase.publish', $app->id) }}" 
                class="waves-effect waves-light btn green">
                    <i class="material-icons">visibility</i>
                </a>
            @else
                <a title="Not Ready To Publish" href="#" 
                class="btn disabled">
                    <i class="material-icons">visibility</i>
                </a>
            @endif

            <a title="Edit" href="{{ route('showcase.edit', $app->id) }}" 
            class="waves-effect waves-light btn indigo">
                <i class="material-icons">open_in_new</i>
            </a>
        </td>
    </tr>

    @endforeach
    
</table>