<?php $class = $thread->isUnread(Auth::id()) ? 'alert-info' : ''; ?>

<div class="media alert {{ $class }} mt-2 rounded-md px-2 py-2 sm:px-4 sm:py-4" href="{{ route('messages.show', $thread->id) }}" >

    <a href="{{ route('messages.show', $thread->id) }}">

        <div>

            <div class="flex">

                <p class="flex-auto font-medium leading-5 md:leading-normal mb-1 text-xs sm:text-sm">
                    
                    {{ $thread->participantsString(Auth::id(),['vorname', 'nachname']) }}

                </p>

                <p class="flex-initial text-sm text-gray-400">
                    
                    <small>{{ $thread->latestMessage->created_at->diffForHumans() }}</small>

                </p>

            </div>

            <div class="flex">

                <div class="flex-auto font-normal leading-5 md:leading-normal mb-1 text-xs sm:text-sm">
                    
                    <p class="text-xs mb-1 text-gray-400">    

                        {{ $thread->latestMessage->body }}
                    
                    </p>

                </div>

                <p class="flex-initial">
                    
                    @if ( $thread->userUnreadMessagesCount(Auth::id())  != '0')

                        <span class="bg-green-600 text-white text-xs inline-block py-1 px-3 rounded-full text-white uppercase last:mr-0 mr-1">{{ $thread->userUnreadMessagesCount(Auth::id()) }}</span>

                    @endif

                </p>

            </div>


            
            <!-- <a href="{{ route('messages.show', $thread->id) }}" class="text-xs">{{ $thread->subject }}</a> -->

        </div>

    </a>

</div>



    <!--<p>

         <small><strong>Abgesandt durch:</strong> {{ $thread->creator()->vorname }}</small>

    </p> -->
