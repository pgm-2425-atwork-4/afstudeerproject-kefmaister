@extends('coordinator.student-detail')

@section('content')
    <div class="grid grid-cols-1 lg:grid-cols-2 gap-8">
        <!-- Left Column: Proposal Fields -->
        <div class="bg-white p-6 rounded shadow">
            <h2 class="text-xl font-semibold mb-4">
                Student: {{ $student->user->firstname }} {{ $student->user->lastname }}
            </h2>
            <div class="mb-4">
                <strong>Klasgroep:</strong> {{ $student->class }}
            </div>
            <div class="mb-4">
                <strong>Studyfield:</strong> {{ $student->studyfield->name ?? 'N/A' }}
            </div>

            @if ($student->proposal)
                @include('coordinator.partials.proposal-fields', ['proposal' => $student->proposal])
            @else
                <p class="mt-4 text-gray-600">No proposal has been submitted by this student yet.</p>
            @endif
        </div>

        <!-- Right Column: Conclusie & Feedback -->
        <div class="bg-white p-6 rounded shadow">
            <form method="POST" action="#">
                @csrf
                <div class="mb-4">
                    <label for="status" class="block font-semibold mb-1">Conclusie</label>
                    <select name="status" id="status" class="w-full border-gray-300 rounded p-2">
                        <option value="approved">Goedgekeurd</option>
                        <option value="denied">Afgekeurd</option>
                        <option value="pending">Pending</option>
                    </select>
                </div>
                <div class="mb-4">
                    <label for="feedback" class="block font-semibold mb-1">Feedback</label>
                    <textarea name="feedback" id="feedback" rows="4" class="w-full border-gray-300 rounded p-2"></textarea>
                </div>
                <button type="submit" class="bg-blue-600 text-white px-4 py-2 rounded">
                    Verstuur
                </button>
                <a href="{{ route('coordinator.home') }}" class="text-blue-600 hover:underline">Back to Home</a>
            </form>
        </div>
    </div>
@endsection
