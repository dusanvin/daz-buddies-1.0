@extends ('layouts.app')

@section('content')

<script src="https://cdn.jsdelivr.net/gh/alpinejs/alpine@v2.x.x/dist/alpine.min.js" defer></script>

<div class="flex flex-row h-full mx-5 mt-10 mb-10">

    <!-- Nav -->

    @include('layouts.navigation')

    <!-- Nav -->

    <!-- Content -->

    <div class="px-1 md:px-8 py-1 md:py-8 text-gray-700 w-screen rounded-r-lg" style="background-color: #EDF2F7;">

        <div class="mx-auto rounded">

            <!-- Tabs -->

            <ul id="tabs" class="inline-flex w-full">

                <li class="px-4 py-2 -mb-px font-medium text-sm text-gray-800 border-b-2 border-gray-700 rounded-t opacity-50 bg-white border-b-4 -mb-px opacity-100"><a href="{{ route('needs.all') }}">Alle Bedarfe</a></li>

                <li class="px-4 py-2 font-medium text-sm text-gray-800 rounded-t opacity-50 bg-white border-gray-400"><a href="{{ route('needs.user') }}">Meine Bedarfe</a></li>

                <li class="px-4 py-2 font-medium text-sm text-gray-800 rounded-t opacity-50 bg-white border-gray-400"><a href="{{ route('needs.make') }}">Bedarf erstellen</a></li>

            </ul>

            <!-- Tabs -->

            <!-- Tab Contents -->

            <div id="tab-contents">

                <!-- Alle Bedarfe -->

                <div id="first" class="p-4 bg-white">

                    <div class="grid grid-cols-1 text-sm text-gray-500 text-light py-1 my-2">

                        <p class="font-medium text-gray-800 leading-none text-lg leading-6">Bedarfsübersicht</p>

                        <p class="text-sm text-gray-500 mt-1 mb-3 mt-2">Erhalten Sie eine Übersicht über alle aktiven Bedarfe. Fragen Sie einen Bedarf an, um Ihr Interesse zu bekunden. Sollte Ihnen ein Bedarf gefallen, können Sie diesen gern liken.</p>

                    </div>

                    @if ($needs->count())

                    <div class="px-6 py-3 border-b border-gray-200 bg-gray-50 text-left text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider rounded-tl-md">

                        Bedarfe

                    </div>

                    <div class="shadow-sm rounded-lg">

                        @foreach($needs as $need)

                        @if($need->active == 1)

                        <div class="bg-white rounded-md pb-4">

                            <div class="px-4 sm:px-6 border-t border-gray-200">

                                <!-- Informationen -->

                                <div class="flex items-center justify-between pt-4">

                                    {{ $need->user->vorname }} {{ $need->user->nachname }}

                                    <div>

                                        <span class="text-gray-400 text-xs"><strong>Bedarf #{{ $need->id }}</strong> erstellt {{ $need->created_at->diffForHumans() }}</span>

                                    </div>

                                </div>

                                <!-- Informationen -->

                                <div class="flex flex-wrap content-start">

                                    <p class="text-gray-400 text-sm mr-5">Betreuungszeitraum: <span class="font-medium">{{ date('m/Y', strtotime($need->datum_start)) }} bis {{ date('m/Y', strtotime($need->datum_end)) }}</span></p>

                                    <p class="text-gray-400 text-sm mr-5">Betreuungsrahmen: <span class="font-medium">{{ $need->rahmen }} Person/en</span></p>

                                    <p class="text-gray-400 text-sm mr-5">Schulart: <span class="font-medium">{{ $need->schulart }}</span></p>

                                    <p class="text-gray-400 text-sm mr-5">Fremdsprachkenntnisse: <span class="font-medium">{{ $need->sprachkenntnisse }}</span></p>

                                    <p class="text-gray-400 text-sm mr-5">Studiengang: <span class="font-medium">{{ $need->studiengang }}</span></p>

                                    <p class="text-gray-400 text-sm mr-5">Fachsemester: <span class="font-medium">{{ $need->fachsemester }}</span></p>

                                </div>

                                <!-- Informationen -->

                                <!-- Body -->

                                <p class="text-gray-600 text-sm my-3">{{ $need->body }}</p>

                                <!-- Body -->

                                <!-- Buttons -->

                                <div class="flex justify-end">

                                    @auth

                                    @if(!$need->ownedBy(auth()->user()))

                                    <!-- Anfragen -->

                                    <form action="{{ route('messages.store') }}" method="post">

                                        {{ csrf_field() }}

                                        <input class="py-2 px-3 bg-gray-100 border-1 w-full rounded-sm form-control form-input" placeholder="Ihr Betreff." value="Anfrage zu Bedarf #{{ $need->id }}" name="subject" type="hidden">

                                        <textarea name="message" placeholder="Ihre Nachricht." style="display:none;">Ich möchte auf Ihren Bedarf #{{ $need->id }} reagieren. Sie suchen {{ $need->rahmen }} Person/en, wobei folgende Spezifika mit angegeben wurden: Sprachkenntnisse: {{ $need->sprachkenntnisse }}, Studiengang {{ $need->studiengang }} und Fachsemester: {{ $need->fachsemester }}. Der Betreuungszeitraum geht vom {{ date('d.m.Y', strtotime($need->datum_start)) }} bis zum {{ date('d.m.Y', strtotime($need->datum_end)) }}. Die Beschreibung Ihres Angebots lautet: {{ $need->body }} - Hätten Sie Interesse an meinem Angebot?</textarea>

                                        <div class="checkbox">

                                            <input name="recipients[]" value="{{  $need->user->id }}" type="hidden">

                                        </div>

                                        <div class="form-group">

                                            <button type="submit" class="ml-4 py-2 px-2 rounded-full bg-gray-700 text-white hover:bg-gray-900 text-sm flex focus:outline-none">

                                                <div class="grid justify-items-center">

                                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">

                                                        <path d="M2.003 5.884L10 9.882l7.997-3.998A2 2 0 0016 4H4a2 2 0 00-1.997 1.884z" />

                                                        <path d="M18 8.118l-8 4-8-4V14a2 2 0 002 2h12a2 2 0 002-2V8.118z" />

                                                    </svg>

                                                    <!-- <span class="mt-1 mx-3">Anfragen</span> -->

                                                </div>

                                            </button>

                                        </div>

                                    </form>

                                    <!-- Anfragen -->

                                    @else

                                    @endif

                                    <!-- Like / Unlike -->

                                    <div class="grid justify-items-center ml-2">

                                        @if (!$need->likedBy(auth()->user()))

                                        <form action="{{ route('needs.likes', $need) }}" method="post">

                                            @csrf

                                            <!-- Like -->

                                            <button type="submit" class="pt-2 pb-1 text-gray-400 hover:text-gray-700 text-xs flex focus:outline-none">

                                                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
                                                    <path d="M2 10.5a1.5 1.5 0 113 0v6a1.5 1.5 0 01-3 0v-6zM6 10.333v5.43a2 2 0 001.106 1.79l.05.025A4 4 0 008.943 18h5.416a2 2 0 001.962-1.608l1.2-6A2 2 0 0015.56 8H12V4a2 2 0 00-2-2 1 1 0 00-1 1v.667a4 4 0 01-.8 2.4L6.8 7.933a4 4 0 00-.8 2.4z" />
                                                </svg><span class="mx-1 mt-1">{{ $need->likes->count() }}</span>

                                            </button>

                                            <!-- Like -->

                                        </form>

                                        @else

                                        <form action="{{ route('needs.likes', $need) }}" method="post">

                                            @csrf

                                            @method('DELETE')

                                            <!-- Unlike -->

                                            <button type="submit" class="pt-2 text-gray-400 hover:text-gray-700 text-xs flex focus:outline-none">

                                                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
                                                    <path d="M2 10.5a1.5 1.5 0 113 0v6a1.5 1.5 0 01-3 0v-6zM6 10.333v5.43a2 2 0 001.106 1.79l.05.025A4 4 0 008.943 18h5.416a2 2 0 001.962-1.608l1.2-6A2 2 0 0015.56 8H12V4a2 2 0 00-2-2 1 1 0 00-1 1v.667a4 4 0 01-.8 2.4L6.8 7.933a4 4 0 00-.8 2.4z" />
                                                </svg><span class="mx-1 mt-1">{{ $need->likes->count() }}</span>

                                            </button>

                                            <!-- Unlike -->

                                        </form>

                                        @endif

                                        <!-- Like / Unlike -->

                                        <!-- <div class="text-xs grid justify-center text-purple-300">Gefällt mir</div> -->

                                    </div>

                                    @endauth

                                </div>

                                <!-- Buttons -->

                            </div>

                        </div>

                        @endif


                        @endforeach

                    </div>

                    <div class="mt-5">

                        {{ $needs->links() }}

                    </div>

                    @else

                    <!-- <p>Keine aktiven Bedarfe momentan vorhanden.</p> -->

                    @endif

                    <!-- Zeige alle needs -->

                </div>

                <!-- Alle Bedarfe -->

            </div>

            <!-- Tab Contents -->

        </div>

        <!-- <script>

                    let tabsContainer = document.querySelector("#tabs");

                    let tabTogglers = tabsContainer.querySelectorAll("a");
                    console.log(tabTogglers);

                    tabTogglers.forEach(function(toggler) {
                      toggler.addEventListener("click", function(e) {
                        e.preventDefault();

                        let tabName = this.getAttribute("href");

                        let tabContents = document.querySelector("#tab-contents");

                        for (let i = 0; i < tabContents.children.length; i++) {

                          tabTogglers[i].parentElement.classList.remove("border-gray-700", "border-b",  "-mb-px", "opacity-100");  tabContents.children[i].classList.remove("hidden");
                          if ("#" + tabContents.children[i].id === tabName) {
                            continue;
                          }
                          tabContents.children[i].classList.add("hidden");

                        }
                        e.target.parentElement.classList.add("border-gray-700", "border-b-4", "-mb-px", "opacity-100");
                      });
                    });

                    document.getElementById("default-tab").click();

                </script> -->

    </div>

    <!-- Content -->

</div>

@endsection