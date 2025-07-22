<x-layout>
    <x-page-heading>New Job</x-page-heading>

    <x-forms.form method="POST" action="/jobs" enctype="multipart/form-data">
        <x-forms.input label="Title" name="title" placeholder="CEO"/>
        <x-forms.input label="Salary" name="salary" placeholder="90,000$ USD"/>
        <x-forms.input label="Location" name="location" placeholder="Winter Park, Japan"/>

        <x-forms.select label="Schedule" name="schedule">
            <option>Part Time</option>
            <option>Full Time</option>
        </x-forms.select>

        <x-forms.input label="URL" name="url" placeholder="https://google.com"></x-forms.input>
        <x-forms.checkbox label="Feature (Cost Extra)" name="featured" />

        <x-forms.divider/>

        <x-forms.input label="Tags (comma seperated)" name="tags" placeholder="Laravel, PHP, Swift"></x-forms.input>

        <x-forms.button>Published</x-forms.button>
    </x-forms.form>
</x-layout>
