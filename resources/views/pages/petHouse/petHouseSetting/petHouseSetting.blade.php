<x-pethouse-layout header="Pet House Setting" class="px-5 pt-5" id="content" activeMenu="Pet House">
    <form action="{{ route('pethouse.managepethouse.setting.create') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <input type="file" name="foto" id="">
        <button class="">Submit</button>
    </form>
    <video class="h-full w-full rounded-lg" controls>
        <source src="https://bucketmeowinn.s3.ap-southeast-1.amazonaws.com/Image/2024-06-05%2020-10-23.mkv" />
        Your browser does not support the video tag.
    </video>
</x-pethouse-layout>
