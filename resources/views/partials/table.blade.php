@php
$label_class = 'text-gray-600 min-w-20 mr-4 block lg:hidden font-normal';
$td_class = 'flex lg:table-cell text-medium lg:text-xs xl:text-xs';
@endphp

<section>
  <h2 class="text-gray-900 font-semibold text-md md:text-lg mb-5">{{ __('Recent activity') }}</h2>

  @if ($applications->total() > 0)
    <table class="w-full max-w-4xl">
      <thead class="hidden lg:table-header-group">
        <tr class="text-left border-b border-gray-500 text-gray-600">
          <th></th>
          <th class="py-3">Service</th>
          <th>Date</th>
          {{-- <th>Package</th> --}}
          <th>Amount</th>
          <th>Status</th>
          <th class="text-right">Action</th>
        </tr>
      </thead>
      <tbody class="divide-y">
        @foreach ($applications as $application)
          <tr class="relative flex flex-col lg:table-row text-gray-800 font-semibold hover:bg-gray-100">
            <td
              class="py-4 pr-4 -z-1 absolute top-1/2 transform -translate-y-1/2 right-0 lg:translate-y-0 lg:relative opacity-5 text-4xl lg:opacity-100 lg:text-xs pl-2">
              {{ $application->id }}</td>
            <td class="{{ $td_class }}">
              <span class="{{ $label_class }}">Service</span>
              {{ __('Letter of No Objection (NiDCOM)') }}
            </td>
            <td class="{{ $td_class }}">
              <span class="{{ $label_class }}">Date :</span>
              {{ date('d/M/Y') }}
            </td>
            {{-- <td class="{{ $td_class }}">
                      <span class="{{ $label_class }}">Package :</span>
                      {{ $application->pricing }}
                    </td> --}}
            <td class="{{ $td_class }}">
              <span class="{{ $label_class }}">Amount :</span>
              ${{ $application->price }}.00
            </td>
            <td class="{{ $td_class }} {{ $application->status }}">
              <span class="{{ $label_class }}">Status :</span>
              {{ $application->status }}
            </td>
            <td class="{{ $td_class }} text-right">
              @if ($application->status === App\Dictionary\ApplicationDictionary::STATUS_UNFINISHED)
                <a href="{{ route('panel.edit-application', ['id' => $application->id]) }}">
                  {{ App\Dictionary\ApplicationDictionary::ACTION_EDIT }}
                </a>
              @endif
            </td>
          </tr>
        @endforeach
      </tbody>
    </table>
    {{ $applications->links() }}
  @else
    <p>
      No applications...
    </p>
  @endif
</section>
