<ul
    class="list-category list-group-numbered ps-0 bg-color-5 w-100 position-absolute start-100 top-0 rounded-0 shadow-sm py-0">
    @foreach ($listCategory as $item)
        <li class="list-category__item header-bottom__category position-relative d-flex align-items-center justify-content-between px-0">
            <a class="color-6 text-decoration-none py-2 px-3 w-100 d-block"
                href="/category/{{ $item->slug }}">{{ $item->name }}
            </a>
            @if ($item->children->count() > 0)
                <svg class="me-2" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink"
                    width="14" height="14" viewBox="0 0 14 14">
                    <g id="arrow_down" data-name="arrow down" transform="translate(14 14) rotate(-180)"
                        clip-path="url(#clip-path)">
                        <g id="Icons" transform="translate(0 0)">
                            <g id="Rounded" transform="translate(0 0)">
                                <g id="Navigation">
                                    <g id="_-Round-_-Navigation-_-arrow_back_ios"
                                        data-name="-Round-/-Navigation-/-arrow_back_ios">
                                        <g id="Group_1915" data-name="Group 1915">
                                            <path id="Path" d="M0,14H14V0H0Z" fill="none" fill-rule="evenodd"
                                                opacity="0.87"></path>
                                            <path id="_-Icon-Color" data-name="🔹-Icon-Color"
                                                d="M6.051,10.732a.729.729,0,0,1-1.033,0L.171,5.884a.581.581,0,0,1,0-.823L5.018.214A.73.73,0,0,1,6.051,1.247L1.827,5.476,6.056,9.705A.727.727,0,0,1,6.051,10.732Z"
                                                transform="translate(3.644 1.524)" fill-rule="evenodd"
                                                fill="currentColor"></path>
                                        </g>
                                    </g>
                                </g>
                            </g>
                        </g>
                    </g>
                </svg>
                @include('layouts.cat-item-menu', ['listCategory' => $item->children])
            @endif
        </li>
    @endforeach
</ul>
