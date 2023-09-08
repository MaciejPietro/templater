<div class="mt-16 grid xl:grid-cols-3 gap-12">
    <div class="space-y-6">

        <div>
            <div class="text-gray-700 font-semibold mb-2">Text</div>
            <livewire:quill :value="$text" field="text">
        </div>

        @include('partials.input', [
            'name' => 'Name',
            'slug' => 'name',
            'placeholder' => '',
            'value' => '',
            'required' => true,
        ])

        @include('partials.input', [
            'name' => 'Position',
            'slug' => 'position',
            'placeholder' => '',
            'value' => '',
        ])

        <fieldset class="p-6 border border-gray-300 rounded-lg space-y-4">
            @include('partials.input', [
                'name' => 'Phone',
                'slug' => 'phone',
                'placeholder' => '',
                'value' => '',
                'type' => 'text',
            ])

            @include('partials.input', [
                'name' => 'Email',
                'slug' => 'email',
                'placeholder' => '',
                'value' => '',
                'type' => 'email',
            ])

            @include('partials.input', [
                'name' => 'Address',
                'slug' => 'address',
                'placeholder' => '',
                'value' => '',
            ])

            @include('partials.input', [
                'name' => 'Website',
                'slug' => 'website',
                'placeholder' => '',
                'value' => '',
            ])


        </fieldset>

        <div>
            <div class="text-gray-700 font-semibold mb-2">Footer</div>
            <livewire:quill :value="$footer" field="footer">
        </div>

    </div>

    <div class=" xl:col-span-2">
        <div class="sticky top-10 bg-gray-200 p-16 rounded-xl">
            <button
                class="copy-to-clipboard absolute top-2 right-2 flex items-center gap-1 py-2 px-3 rounded-lg bg-white">
                @include('icons.clipboard')
                <div class="text-sm font-bold text-gray-700">
                    copy
                </div>
            </button>
            <div class="bg-white">
                @include('templates.classical.template')
            </div>
        </div>
    </div>
</div>
