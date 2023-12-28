<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>Chat</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" />
    <link rel="stylesheet" href="/css/chat.css">
</head>
<body>
    <div class="container">
        <div class="row clearfix">
            <div class="col-lg-12">
                <div class="card chat-app">
                    <div id="plist" class="people-list">
                        <div class="input-group">
                            <div class="input-group-prepend">
                                <span class="input-group-text"><i class="fa fa-search"></i></span>
                            </div>
                            <input type="text" class="form-control" placeholder="Search...">
                        </div>
                        @can('role', 'admin')
                            <ul class="list-unstyled chat-list mt-2 mb-0">
                                @foreach($users as $member)
                                    <li class="clearfix{{ $member->id === $chatLatest->id ? ' active' : ''}}" id="chat-user-{{ $member->id }}" data-user-id="{{ $member->id }}">
                                        <img src="https://ui-avatars.com/api/?name={{ str_replace(' ', '+', $member->nama) }}" alt="avatar">
                                        <div class="about">
                                            <div class="name">{{ $member->nama }}</div>
                                            <div class="status"> <i class="fa fa-circle online"></i> online </div>
                                        </div>
                                    </li>
                                @endforeach
                            </ul>
                        @endcan
                        @can('role', 'user')
                            <ul class="list-unstyled chat-list mt-2 mb-0">
                                <li class="clearfix active">
                                    <img src="https://ui-avatars.com/api/?name=Admin" alt="avatar">
                                    <div class="about">
                                        <div class="name">Admin</div>
                                        <div class="status"> <i class="fa fa-circle online"></i> online </div>
                                    </div>
                                </li>
                            </ul>
                        @endcan
                    </div>
                    <div class="chat">
                        <div class="chat-header clearfix">
                            <div class="row">
                                <div class="col-lg-6">
                                    <a href="javascript:void(0);" data-toggle="modal" data-target="#view_info">
                                        <img src="https://ui-avatars.com/api/?name={{ $user->role === 'admin' ? str_replace(' ', '+', $chatLatest->nama) : 'Admin' }}" alt="avatar">
                                    </a>
                                    <div class="chat-about">
                                        <h6 class="m-b-0">{{ $user->role === 'admin' ? $chatLatest->nama : 'Admin' }}</h6>
                                        <small>Online</small>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="chat-history">
                            <ul class="m-b-0">
                                @foreach($chatLatest->chats as $index => $chat)
                                    <!-- for user page -->
                                    @if (@$chat->from_me and $user->id === $chat->admin_id) 
                                        <li class="clearfix">
                                            <div class="message-data text-right">
                                                <span class="message-data-time">{{ $chat->created_at_formatted_human }}</span>
                                                <span class="message-data-time-datetime">{{ $chat->created_at_formatted }}</span>
                                                <img src="https://ui-avatars.com/api/?name={{ str_replace(' ', '+', $chat->user->nama) }}" alt="avatar">
                                            </div>
                                            <div class="message other-message float-right">{{ $chat->message }}</div>
                                            <span class="message-mark-status float-right">{{ $loop->index+1 === count($chatLatest->chats) ? ($chat->mark_read ? 'Dibaca' : '') : '' }}</span>
                                        </li>
                                    @endif 

                                    @if (!$chat->from_me and $user->id === $chat->admin_id)
                                        <li class="clearfix">
                                            <div class="message-data">
                                                <span class="message-data-time">{{ $chat->created_at_formatted_human }}</span>
                                                <span class="message-data-time-datetime">{{ $chat->created_at_formatted }}</span>
                                            </div>
                                            <div class="message my-message">{{ $chat->message }}</div>
                                        </li>
                                    @endif

                                    <!-- for admin page -->
                                    @if (@$chat->from_me and $user->id !== $chat->admin_id) 
                                        <li class="clearfix">
                                            <div class="message-data">
                                                <span class="message-data-time">{{ $chat->created_at_formatted_human }}</span>
                                                <span class="message-data-time-datetime">{{ $chat->created_at_formatted }}</span>
                                            </div>
                                            <div class="message my-message">{{ $chat->message }}</div>
                                        </li>
                                    @endif 

                                    @if (!$chat->from_me and $user->id !== $chat->admin_id)
                                        <li class="clearfix">
                                            <div class="message-data text-right">
                                                <span class="message-data-time">{{ $chat->created_at_formatted_human }}</span>
                                                <span class="message-data-time-datetime">{{ $chat->created_at_formatted }}</span>
                                                <img src="https://ui-avatars.com/api/?name={{ str_replace(' ', '+', $user->nama) }}" alt="avatar">
                                            </div>
                                            <div class="message other-message float-right">{{ $chat->message }}</div>
                                            <span class="message-mark-status float-right">{{ $loop->index+1 === count($chatLatest->chats) ? ($chat->mark_read ? 'Dibaca' : '') : '' }}</span>
                                        </li>
                                    @endif

                                    <!-- @if (@$chat->from_me and $user->id === $chat->admin_id) 
                                        <li class="clearfix">
                                            <div class="message-data text-right">
                                                <span class="message-data-time">{{ $chat->created_at_formatted }}</span>
                                                <img src="https://ui-avatars.com/api/?name={{ str_replace(' ', '+', $chat->user->nama) }}" alt="avatar">
                                            </div>
                                            <div class="message other-message float-right">{{ $chat->message }}: {{ $chat->from_me }}</div>
                                        </li>
                                    @else 
                                        <li class="clearfix">
                                            <div class="message-data">
                                                <span class="message-data-time">{{ $chat->created_at_formatted }}</span>
                                            </div>
                                            <div class="message my-message">{{ $chat->message }}: {{ $chat->from_me }}</div>
                                        </li>
                                    @endif -->
                                @endforeach
                                <!-- <li class="clearfix">
                                    <div class="message-data">
                                        <span class="message-data-time">10:12 AM, Today</span>
                                    </div>
                                    <div class="message my-message">Are we meeting today?</div>                                    
                                </li>                               
                                <li class="clearfix">
                                    <div class="message-data">
                                        <span class="message-data-time">10:15 AM, Today</span>
                                    </div>
                                    <div class="message my-message">Project has been already finished and I have results to show you.</div>
                                </li> -->
                            </ul>
                        </div>
                        <div class="chat-message clearfix">
                            <div class="input-group mb-0">
                                <div class="input-group-prepend">
                                    <span class="input-group-text"><i class="fa fa-send"></i></span>
                                </div>
                                <input type="text" class="form-control" placeholder="Enter text here...">                                    
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div id="admin_id" data-admin-id="{{ auth()->user()->id }}"></div>
    <div id="user_id" data-user-id="{{ $user->id }}"></div>
    <div id="role" data-role="{{ $user->role }}"></div>
    <div id="chat_latest_id" data-chat-latest-id="{{ $chatLatest->id }}"></div>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.0/jquery.min.js"
        integrity="sha512-3gJwYpMe3QewGELv8k/BX9vcqhryRdzRMxVfq6ngyWXwo03GFEzjsUm8Q7RZcHPHksttq7/GFoxjCVUjkjvPdw=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.0/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        $(document).ready(function() {
            var user_id = $('#user_id').data('user-id')
            var role = $('#role').data('role')

            console.log('user_id', user_id)
            console.log('role', role)

            if (role === 'user') {
                setTimeout(() => {
                    setInterval(() => {
                        // get chat data
                        $.get(`/ajax/chats/${user_id}`)
                            .done(({ data: { chats } }) => {
                                console.log('response from ajax', chats)
        
                                // clear perpose element
                                $('.chat-history ul').html('')
                                
                                if (chats.length > 0) {
                                    chats.forEach((chat, index) => {
                                        if (chat.from_me && user_id === chat.admin_id) {
                                            $('.chat-history ul').append(`
                                                <li class="clearfix">
                                                    <div class="message-data text-right">
                                                        <span class="message-data-time">${chat.created_at_formatted_human}</span>
                                                        <span class="message-data-time-datetime">${chat.created_at_formatted}</span>
                                                        <img src="https://ui-avatars.com/api/?name=${(chat.user.nama).replace(' ', '+')}" alt="avatar">
                                                    </div>
                                                    <div class="message other-message float-right">${chat.message}</div>
                                                    <span class="message-mark-status float-right">${index+1 === chats.length ? (chat.mark_read ? 'Dibaca' : '') : ''}</span>
                                                </li>
                                            `)
                                        }
        
                                        if (!chat.from_me && user_id === chat.admin_id) {
                                            $('.chat-history ul').append(`
                                                <li class="clearfix">
                                                    <div class="message-data">
                                                        <span class="message-data-time">${chat.created_at_formatted_human}</span>
                                                        <span class="message-data-time-datetime">${chat.created_at_formatted}</span>
                                                    </div>
                                                    <div class="message my-message">${chat.message}</div>
                                                </li>
                                            `)
                                        }
                                    })
                                    
                                }
                            })
                    }, 2_000); // for 2 second
                }, 3_000); // 3 second for wait receiving incoming message
            }

            if (role === ' admin') {
                //
            }

            $('ul.chat-list li').click(function(e) {
                // var bulk_user_id = user_id
                
                user_id = $(this).data('user-id')

                $(this).find('.active').removeClass('active')
                // $('ul.chat-list li').find(`#chat-user-${user_id}`).addClass('active')

                // console.log('bulk_user_id', bulk_user_id)
                console.log('user_id', user_id)
                // console.log('active_menu element:', active_menu.html())
                if (role === ' admin') {
                    // $(this).removeClass('active')
                }
            })
        })
    </script>
</body>
</html>