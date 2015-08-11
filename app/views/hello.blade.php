@extends('template.layout')

@section('content')
<div class="tiles">
    <div class="tile double-down bg-blue-hoki">
        <a href="{{ URL::route('apartamente_proprietar')  }}" style="text-decoration: none;">
            <div class="tile-body">
                <i class="fa fa-bell-o"></i>
            </div>
            <div class="tile-object">
                <div class="name">
                    Apartamente
                </div>
                <div class="number">
                    6
                </div>
            </div>
        </a>
    </div>
    <div class="tile bg-red-sunglo">
        <a href="{{URL::route('cautare-apartamente-index')}}" style="text-decoration: none;">
            <div class="tile-body">
                <i class="fa fa-search"></i>
            </div>
            <div class="tile-object">
                <div class="name">
                    Caută apartamente
                </div>
                <div class="number">
                    6
                </div>
            </div>
        </a>
    </div>
    <div class="tile double selected bg-green-turquoise">
        <a href="{{URL::route('dezvoltatori-index')}}" style="text-decoration: none;">
            <div class="corner">
            </div>
            <div class="check">
            </div>
            <div class="tile-body">
                <p>
                    Dezvoltatori
                </p>
            </div>
            <div class="tile-object">
                <div class="name">
                    <i class="fa fa-envelope"></i>
                </div>
                <div class="number">
                   2
                </div>
            </div>
        </a>
    </div>
    <div class="tile selected bg-yellow-saffron">
        <a href="{{URL::route('cautare_dezvoltatori_index')}}"  style="text-decoration: none;">
            <div class="corner">
            </div>
            <div class="tile-body">
                <i class="fa fa-user"></i>
            </div>
            <div class="tile-object">
                <div class="name">
                    Căutare dezvoltatori
                </div>
                <div class="number">
                    2
                </div>
            </div>
        </a>
    </div>
    <div class="tile double bg-blue-madison">
        <a href="{{ URL::route('agentii-index')  }}" style="text-decoration: none;">
            <div class="tile-body">
                {{ HTML::image('assets/admin/pages/media/profile/photo1.jpg')  }}
                <h4>Agenții</h4>
            </div>
            <div class="tile-object">
                <div class="name">
                    Lista de agenții la data:
                </div>
                <div class="number">
                    {{ \Carbon\Carbon::now()->format('d.m.Y')  }}
                </div>
            </div>
        </a>
    </div>
    <div class="tile bg-purple-studio">
        <div class="tile-body">
            <i class="fa fa-shopping-cart"></i>
        </div>
        <div class="tile-object">
            <div class="name">
                Orders
            </div>
            <div class="number">
                121
            </div>
        </div>
    </div>
    <div class="tile image selected">
        <div class="tile-body">
            {{ HTML::image('assets/admin/pages/media/gallery/image2.jpg')  }}
        </div>
        <div class="tile-object">
            <div class="name">
                Media
            </div>
        </div>
    </div>
    <div class="tile bg-green-meadow">
        <div class="tile-body">
            <i class="fa fa-comments"></i>
        </div>
        <div class="tile-object">
            <div class="name">
                Feedback
            </div>
            <div class="number">
                12
            </div>
        </div>
    </div>
    <div class="tile double bg-grey-cascade">
        <a href="{{ URL::route('user-profile') }}" style="text-decoration: none;">
            <div class="tile-body">
                {{ HTML::image('assets/admin/pages/media/profile/photo2.jpg')  }}
                <h3>Profil</h3>
                <p>
                    Vizualizați profilul utilizatorului
                </p>
            </div>
            <div class="tile-object">
                <div class="name">
                    <i class="fa fa-twitter"></i>
                </div>
                <div class="number">
                    {{ \Carbon\Carbon::now()->format('d.m.Y')  }}
                </div>
            </div>
        </a>
    </div>
    <div class="tile bg-red-intense">
        <div class="tile-body">
            <i class="fa fa-coffee"></i>
        </div>
        <div class="tile-object">
            <div class="name">
                Meetups
            </div>
            <div class="number">
                12 Jan
            </div>
        </div>
    </div>
    <div class="tile bg-green">
        <div class="tile-body">
            <i class="fa fa-bar-chart-o"></i>
        </div>
        <div class="tile-object">
            <div class="name">
                Reports
            </div>
            <div class="number">
            </div>
        </div>
    </div>
    <div class="tile bg-blue-steel">
        <div class="tile-body">
            <i class="fa fa-briefcase"></i>
        </div>
        <div class="tile-object">
            <div class="name">
                Documents
            </div>
            <div class="number">
                124
            </div>
        </div>
    </div>
    <div class="tile image double selected">
        <div class="tile-body">
            {{ HTML::image('assets/admin/pages/media/gallery/image4.jpg')  }}
        </div>
        <div class="tile-object">
            <div class="name">
                Gallery
            </div>
            <div class="number">
                124
            </div>
        </div>
    </div>
    <div class="tile bg-yellow-lemon selected">
        <div class="corner">
        </div>
        <div class="check">
        </div>
        <div class="tile-body">
            <i class="fa fa-cogs"></i>
        </div>
        <div class="tile-object">
            <div class="name">
                Settings
            </div>
        </div>
    </div>
    <div class="tile bg-red-sunglo">
        <div class="tile-body">
            <i class="fa fa-plane"></i>
        </div>
        <div class="tile-object">
            <div class="name">
                Projects
            </div>
            <div class="number">
                34
            </div>
        </div>
    </div>
</div>
@stop