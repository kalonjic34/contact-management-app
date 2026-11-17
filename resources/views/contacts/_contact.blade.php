 <tr>
    <th scope="row" class="text-muted">{{ $contacts->firstItem()+$index}}</th>
        <td>{{ $contact->first_name }}</td>
        <td>{{ $contact->last_name}}</td>
        <td><span class="text-decoration-none text-dark">{{ $contact->email }}</span></td>
        <td><span class="badge bg-light text-dark rounded-pill px-2 py-1">{{ $contact->company->name }}</span></td>
        <td class="text-end" width="170">
            <div class="d-flex justify-content-end gap-2">
            @if ($show_trash_buttons)
                <form action="{{ route('contacts.restore',$contact->id) }}" method="POST" style="display: inline">
                @csrf
                @method('delete')
                <button type="submit" href="#" class="btn btn-sm btn-circle btn-outline-info" title="Restore"><i class="fa fa-undo"></i></button>
            </form>
                <form action="{{ route('contacts.force-delete',$contact->id) }}" onsubmit="return confirm('your data will be removed permanently. are you sure?')" method="POST" style="display: inline">
                @csrf
                @method('delete')
                <button type="submit" href="#" class="btn btn-sm btn-circle btn-outline-danger" title="Delete permanently"><i class="fa fa-times"></i></button>
            </form>
            @else
            <a href="{{ route('contacts.show',$contact->id) }}" class="btn btn-sm btn-circle btn-outline-info" title="Show"><i class="fa fa-eye"></i></a>
            <a href="{{ route('contacts.edit', $contact->id) }}" class="btn btn-sm btn-circle btn-outline-secondary" title="Edit"><i class="fa fa-edit"></i></a>
            <form action="{{ route('contacts.destroy',$contact->id) }}" method="POST" style="display: inline">
                @csrf
                @method('delete')
                <button type="submit" href="#" class="btn btn-sm btn-circle btn-outline-danger" title="Delete"><i class="fa fa-trash"></i></button>
            </form>
            @endif
            </div>
        </td>
    </tr>