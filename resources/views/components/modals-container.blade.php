@can('update', $idea)
    <livewire:ideas.edit-idea :$idea />
@endcan

@can('delete', $idea)
    <livewire:ideas.delete-idea :$idea />
@endcan

@auth
    <livewire:ideas.report-spam :$idea />
@endauth

@admin
    <livewire:ideas.mark-not-spam :$idea />
@endadmin
