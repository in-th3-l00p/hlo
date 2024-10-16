@php use Carbon\Carbon; @endphp
<section x-show="tab === 'events'">
    <x-admin.operations.container class="mb-8">
        <a
            href="{{ route(
                "admin.classrooms.events.create",
                [ "classroom" => $classroom ]
            ) }}"
            class="icon-btn"
            title={{ __("Add") }}
        >
            <i class="fas fa-plus"></i>
        </a>
    </x-admin.operations.container>

    @forelse ($events as $event)
        <div
            @class([
                "w-full",
                "bg-white p-8 rounded-md shadow-md",
                "hover:scale-105 hover:shadow-lg transition-all mb-8",
                "flex flex-wrap justify-between gap-8"
            ])
        >
            <div>
                <h2 class="text-xl font-bold">{{ $event->name }}</h2>
                <p class="mb-4">{{ $event->owner->name }}</p>
                @if ($event->start)
                    <p class="text-zinc-500">
                        {{ __("Starts at:") }}
                        {{ Carbon::create($event->start)->format("Y-m-d H:i") }}
                    </p>
                @endif
                @if ($event->end)
                    <p class="text-zinc-500">
                        {{ __("Ends at:") }}
                        {{ Carbon::create($event->end)->format("Y-m-d H:i") }}
                    </p>
                @endif

                <div class="mt-4">
                    {!! $event->description !!}
                </div>
            </div>
            <div class="scale-90">
                @if ($event->self_attend)
                    <a
                        href="{{ route("admin.classrooms.events.attendees.show-attend-code", [
                            "classroom" => $classroom,
                            "event" => $event
                        ]) }}"
                        class="btn mb-4"
                        title={{ __("Show attend code") }}
                    >
                        <i class="fas fa-eye"></i>
                        {{ __("Show attend code") }}
                    </a>
                @endif

                <a
                    href="{{ route(
                        "admin.classrooms.events.attendees.index",
                        [ "classroom" => $classroom, "event" => $event ]
                    ) }}"
                    class="btn mb-4"
                    title={{ __("Attendees") }}
                >
                    <i class="fas fa-user"></i>
                    {{ __("Attendees") }}
                </a>

                <a
                    href="{{ route(
                        "admin.classrooms.events.edit",
                        [ "classroom" => $classroom, "event" => $event ]
                    ) }}"
                    class="btn mb-4"
                    title={{ __("Edit") }}
                >
                    <i class="fas fa-edit"></i>
                    {{ __("Edit") }}
                </a>

                <a
                    class="btn"
                    title="{{ __("Delete") }}"
                    href="{{ route("admin.classrooms.events.delete", [
                        "classroom" => $classroom,
                        "event" => $event
                    ]) }}"
                >
                    <i class="fas fa-trash"></i>
                    {{ __("Delete") }}
                </a>
            </div>
        </div>
    @empty
        <p class="empty-text">
            {{ __("No events found.") }}
        </p>
    @endforelse

    {{ $events->links() }}
</section>
