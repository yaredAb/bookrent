@props(['title', "price","cover"])

<div class="py-3">
    <img src="{{asset($cover)}} " alt="cov1" class="object-cover w-40 sm:w-40 md:w-48 h-52" />
    <p class="font-bold text-sm">{{ $title }}</p>
    <p class="text-sm">***** (301)</p>
    <p class="font-semibold">USD {{ $price}}</p>
    <a href="#" class="underline text-sm">Yared Sebsbe</a>
</div>
