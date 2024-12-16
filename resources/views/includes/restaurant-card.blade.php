<div class="col-md-4 mb-4">
    <a href="/restaurant/{{$id}}" style="text-decoration: none; color: inherit;">
        <div class="card" style="position: relative; border: none; box-shadow: 0px 4px 6px rgba(0, 0, 0, 0.1); border-radius: 10px; overflow: hidden;">
            @if ($discount > 0)
                <div class="discount-badge" style="position: absolute; top: 10px; right: 10px; background-color: var(--dark-purple-50); color: white; padding: 5px 10px; font-size: 0.8rem; border-radius: 20px; z-index: 2;">
                    Up to {{$discount}}% Off
                </div>
            @endif
            <figure class="mb-0" style="width: 100%; height: 200px; overflow: hidden;">
                <img src="{{$image}}" alt="Restaurant 1" style="width: 100%; height: 100%; object-fit: cover;">
            </figure>
            <figcaption class="p-3 text-center" style="background: var(--dark-purple-50); color: white; font-weight: bold;">
                {{$restaurant}}
            </figcaption>
        </div>
    </a>
</div>
