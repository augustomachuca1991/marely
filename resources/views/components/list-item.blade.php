<article class="flex items-start space-x-6 p-6">
        <img src="{{$product->profile_photo_url}}" alt="avatar" width="60" height="88"
        class="flex-none rounded-md bg-gray-100" />
    <div class="min-w-0 relative flex-auto">
        <h2 class="font-semibold text-gray-900 pr-20">{{$product->code}} - {{$product->name}}</h2>
        <dl class="mt-2 flex flex-wrap text-sm leading-6 font-medium">
            <div class="absolute top-0 right-0 flex items-center space-x-1">
                <dt class="text-sky-500">
                    <span class="sr-only">{{__('show')}}</span>
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                        <path stroke-linecap="round" stroke-linejoin="round" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z" />
                      </svg>
                </dt>
                <dd>{{__('info')}}</dd>
            </div>
            <div>
                <dt class="sr-only">category</dt>
                <dd class="px-1.5 ring-1 ring-gray-200 rounded">{{$product->category->name}}</dd>
            </div>
            <div class="ml-2">
                <dt class="sr-only">price</dt>
                <dd>${{$product->sale_price}}</dd>
            </div>
            <div>
                <dt class="sr-only">{{__('supplier')}}</dt>
                <dd class="flex items-center">
                    <svg width="2" height="2" fill="currentColor" class="mx-2 text-gray-300"
                        aria-hidden="true">
                        <circle cx="1" cy="1" r="1" />
                    </svg>
                    {{$product->created_at}}
                </dd>
            </div>
            <div>
                <dt class="sr-only">stock</dt>
                <dd class="flex items-center">
                    <svg width="2" height="2" fill="currentColor" class="mx-2 text-gray-300"
                        aria-hidden="true">
                        <circle cx="1" cy="1" r="1" />
                    </svg>
                    stock {{$product->stock}}
                </dd>
            </div>
            <div class="flex-none w-full mt-2 font-normal">
                <dt class="sr-only">{{__('description')}}</dt>
                <dd class="text-gray-400">{{$product->description}}</dd>
            </div>
        </dl>
    </div>
</article>
