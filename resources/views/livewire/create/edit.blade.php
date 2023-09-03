<div class="mt-16 grid xl:grid-cols-3 gap-12">
    <div class="space-y-6">

        <div>
            <div class="text-gray-700 font-semibold mb-2">Text</div>
            <livewire:quill :value="$text">
        </div>

        @include('partials.input', [
            'name' => 'Name',
            'slug' => 'name',
            'placeholder' => '',
            'value' => '',
            'required' => true,
        ])

        @include('partials.input', [
            'name' => 'Role',
            'slug' => 'role',
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

        @include('partials.textarea', [
            'name' => 'Footer',
            'slug' => 'footer',
            'placeholder' => '',
            'value' => '',
        ])

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
                @include('templates.classical')
            </div>
        </div>
    </div>
</div>
