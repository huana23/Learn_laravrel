<table class="table">
    <thead>
    <tr>
        <th><input type="checkbox" value="" id="checkAll" class="input-text"></th>
        <th>Avatar</th>
        <th>Thông tin thành viên</th>
        <th>Địa chỉ</th>
        <th>Tình trạng</th>
    </tr>
    </thead>
    <tbody>
        @if(isset($users) && is_object($users))
        @foreach ($users as $user)
            
       
        <tr>
            <td><input type="checkbox" value="" id="checkBoxItem" class="input-text"></td>
            <td><img class="img-staff" src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAQMAAADCCAMAAAB6zFdcAAAApVBMVEX08+5PQUz18+9LPUhMPklENUFGN0NIOkX08O/07+9DM0BENkH19PD18vBBMj5JOkbTx8/az9bt5Ojy6u1YSVWRg47i2N5eT1tqW2dTRFC1qLHc0diIeoXVydHCtb6ekJupm6WAcX3Iu8R1ZnJkVWGZi5aBc36xoK7p3uR4aXWmmKKXh5S7rbfn2ePy5+2Ofos2JjMzITDezdvBr76hj54uGivRwM0EI0R5AAALeElEQVR4nO2cCXOjuBLH0YGEMAiMMKcxmCMBx4mTzPH9P9prYTuTzM7s21e1uynz9KtKyomdKtT08e+WiGUZDAaDwWAwGAwGg8FgMBgMBoPBYDAYDAaDwWAwGAwGg8FgMBgMBoPBYDAYDAaDwWAwGAz/12Df/+xL+GxUeygq5X32ZXwOHvYdR4ijXNnsbvzsq/n38UW0bot6s92cMooQsvfqsy/p38KbXd5XZXEXBzZjAeeBNgHwuPhowHDjo3ENJONj0cHqCWcuWEFjM4roXSU++yL/SXwx7up9T92ZgNoE7nt/anbhOgHKsEltyt2HcbH1wRmLiUlGLj5/Ie++hpF/jg3Pj4qUIpYfl+kKTlKj+b5TEpw9n51TAOUyrdfXRePHnHIqtyP+1Kv9J8BRQxksmLAgnYam2O2OxeHhrs+Z9gvK7LvwYoUx6E42ZWnofO4V/+34VSbhjjO6L9ZK+D7GHgZRIFQSNvvc5ghxd1vqVXuVmz3tYk6ChcWDOAYQBSw+JOJnF/d0ntyCdRAPDhG2cCt7hZPJprJYklIQjaSIBPXv0j0WZZ1DpNjZ2seNnASEziCRbJbjCWAC8PX+T8u+kwyMoIDu1CAHbSoFf+QWSzGCs3O1BP5vNV9UnY2ofT/J3VwnRWNTN1yGUMBrStFq+/Srt/D77AClw4WsgPLo/LOqbZovo4NSHUd8in76LSjmsWrDthoj5VxvtmgRQfx0TYVqz9l2CdHgHyWi8cfb6avqsI9nvSxlnm2KdXQWA/46Jshur96R5FSGC9BKKiNItu/DGvRwJhkIAC0XOSeE2zIdQqU/45cxpTS5fvIoSbeAArmWiEzv1oHVMbYJYaTfD4fDYdhm+dw7yqyIwAp+GCB+9xYNGZHhp1z23wluGLJ3P/wZJ3tJeTAVpZaLgFBjWNzlYBaZFqCR/MIFv7n8Ad7ZwebmNbOz4Yglbz/6Vcop21Yf5CIGqXicGHRKWSsgEwY/AiCiNL75YBBbTuO3ooCrnPC0/YNg1lKxOkFIuHXkrW30FgBiG9jVv3Wt/xRgA0SvVQEnMWFd8hvdI6rJpXaXqC0PhksA4ILZx1ufrfkHht7qWzTxoIs+OMG5exSzWbAqoEikZStpegkA6KDY4da1IiwCBaez0HEaSdIfsxHsqCha7w6bu2lbh/O+glP1AUlfockuz5/xQsnqW7eBFcUU2WdHAMljv5M8623XI+YyPk9Vu0S/g5OMk2xPr5VhGTbwG+iEUp0RnHrFBoGv0Y3bl/eTRZbOmROPGac5WhVLsoEVpdADQBbwxpzmX4pid20gRQMykRDtBCwIAvdcQTF4C0Kr5mwDfLSv5rhlcKhnRH0poHFAbMVkfo0HkTTbrps2h11YjmN06Y780P1hA7/m7hI6BudoI0TI8Y6cvd5+6wU9XwCOjz0P2mitGufPDwyxy80HsRwson0WRxvcm+sxOqWBffUD7ERjkpTrKmzb47FooHtoWp0UIGhW92c7ldA0LaF71nOBPNAeEMdptj2OZ/2Dk6GP9VRdArYNUQLIbo3nNHoePjo1s4vbT4kzfrLVie7L4+P4pM5rwkm/oh93nDRBvPatMaNo1bfCi3L6rtm4aUTSfnmIEdlup67vziNzZ1ghoucHeoJAIEgu9iB9s1b3TO/GDFEBbeMiQgGPGypXOh0QvVwiayWUeuopmYpDPWy2d9OUZWma53q+DtERdA98lgxZTGX52Zf/txB1K8iIXN9ZxoKcoODrPstOMZJrz1Hj4+OTAJtEEZTHgp19gZ99giK2DDdwDqAL0q/3nExhmYxPG450FpQUeikv2aOgfygvCsAr3Z/zwyIK49wwgFr+ynmtkuJwhBcnveWaUrf1WrjXdNVfBgy4sOeAebMAf3haRFUo57JIOeieSkIJRHpwjD0xEbCB8wpOguRl2KaHDWRfd4HNr11EXC9hEz4JaDzvLMu2zOeFzU2h2BPZetATaeV4UYVRqgPEF2M7XH2Bsry9+YGipXqePe42MbKrecFXG5y4nrVGKafkMi3w9Aw605XTf+znUsk4hMqP/YabRWyCYPTUltPkvQ2czWwDv+ryfnfZYYF0MMtCZ5fN2eD+uM0hOtKbT4yQ6GRoiY7kUdTZBO6sq8PfBxl8xHqAllyUo6UmMhcCXw19zuA134zjZoUWIJfXoPk9FRN9tOKh22zJbAMwDf+4maj3p9ngOOGmGFWym6BGrLoIDEOmmxcJUco2fsTmBtBRoubnQRnkSrd1LlMlCAqxC2a3dzbPL42vB6xQUFZbpSesP+/Y3hxiw/JxlJe77g/B2QagnWhwCNdJCVTh7o5RQnVbnQzb9fyBHdO5I5HvNihulrXN968yGISHPTym1x4gOkmitxqBgDGbE5lBz4ij8UkbKxotMTCoE19WS9h3dRrJU8pPYdjuip6srmlAHTPXnk/p2gDr9HajpTpXH1bAxyzyEogGOnHZ3HxOhGi4t8Gt+Tws4TJ7K3W+SqpyPqRbVdV43mhxDs/fWj1HeWk90FGInPLs5mujxklOHMUpkGfNh+D2vPmU7vm7fmGJKlSWGAf5VYkDQ8HmSd28RprxWpvdPymlnnQT5Il5WfN3R72TwjgJEwHWEDW02KgPG0gI+5svjBdwK/W4XISbQVm43O8jnSY6qI1Vdu2KfN9yTi8BfMBy2oxSOpXaD+6WZQNxkHavQDCs9NkzZyvdCpdy1Zc6EKL6qKyqd7+1lj6nIPNXIbYBetuCvnn0/nHjtzIIQuy1z7Jx9OaLC+IJZAKfa1/0Ar/FUbjT+cKvXwrHGt/1lLfPvG/oFO5+DYtP9pexauFuHEsN8lkfuRD1M430813zW81RWDolIncZA0XA/y75xoH2aN5cFo7vO/AlEp0KVJHOx07UsVH6zXOJxJAUQB7wxaREa6T0Xecj2no4nYb68oiCf9lqnLfaFHRMPghKX+30uF1Wt34K5Q1QyPPZkvPh3OSb3mgO5E/HrbA+sAotUzy0YVhMTJtgQUfX8RO0wAlOiup8Jp25bOXm749uwsty20BsjCnjWkDraZp8uP1O4Qd6E70t0fN+dn9n3DVNG70zQVKXfvks4zXGSSbpeZQYLOopDks9cF4fn9PKOTs3/nhm3Qpf3Fa0+fMkIBMce/1US1onS5EGM04tKe3HMlKH0x/vrS4O04om/rgLVVuMjzlF3xO1KAtAJRj6jLqhB/ro+UPPpJ1hbKFpHqeXHfaFJ7rn9MTZIBZTD94Qaif5VuHiZdDBMDdLWPdIjoV33+7ALqqKnOKQOGFMOKIL2XH/CSiPdoijtdIn9FvHCrPR8g9yja2EytrRbbNTP6eh+k6RLBYWBxcqm5LsHAdRjyL/8Nz4YIONAM0sQSVrfThmNvreEbLU5//XaUrYVi8Omoc88mt5cvBO6g5SFFMkTlAIcdJxShD/ulAbOFGVU/uk/Ei1L3vhF3IrrCiw15YPudBS2fNGeeKLPrhlvyymUfoZ5wtDq/131Eab0rMSt/At5/CtUgfdN0B3LYuxDhBPX9vm9ofpv0HdBYzyQH4R0DZafjJPDY5qDFilN2FrFvcrRKYR4wXMkX9D8pzfx1D30qZsdS/k6FN62BL71Z1yVPU1p5RzflpOl/QLVDg6j9A70RVD9FiOr+53fU5VF8P7TS85Ddjp3paLmKT/Gc5GdoHuilcSpaTf7/ddluaIcYJovlkLUe0WWhN+4AzTU9JklOjHFpD2fUL10XWW0/hxfs5pKePD34OjSD+7+XxqNlNPaZzHiPb7oQhf2YJGRn+Fskt8RzxS+Ti+xvK78LHn7PrFioJf4s9e72xypU/qn/sjZ2m98l9j1P/eIFrWpOR/xVt+/jMYDAaDwWAwGAwGg8FgMBgMBoPBYDAYDAaDwWAwGAwGg8FgMBgMBoPBYDAYDAaDwWD4Nf8BICbY1E7pzVYAAAAASUVORK5CYII=" alt="" ></td>
            <td>
                <div class="info-item name">
                    {{ $user->name }}
                </div>
                <div class="info-item email">
                    {{ $user->email }}
                </div>
                <div class="info-item phone">
                    {{ $user->phone }}
                </div>
            </td>
            <td>
                <div class="address-item name">
                    {{ $user->address }}
                </div>
                <div class="address-item email">
                    Phường : {{ $user->ward_id }}
                </div>
                <div class="address-item phone">
                    Quận/Huyện : {{ $user->district_id }}
                </div>
                <div class="address-item phone">
                    Thành phố : {{ $user->province_id }}
                    
                </div>
            </td>
            <td> 
                <input type="checkbox" class="js-switch" checked/>
            </td>
            <td class="text-center">
                <a href="{{route('user.edit', $user->id)}}" class="btn btn-success"><i class="fa fa-edit"></i></a>
                <a href="" class="btn btn-danger"><i class="fa fa-trash"></i></a>
            </td>
        </tr>
    @endforeach
    @endif
    
    </tbody>
</table>

{{ $users->links('pagination::bootstrap-4') }}

