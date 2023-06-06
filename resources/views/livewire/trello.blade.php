<div>
    <h1>Планувальник завдань Trello</h1>
     <div class="p-3">
         @if($addGroup)
             <form wire:submit.prevent="save">
                 <label>
                     <input wire:model.defer="title" type="text">
                 </label>
             </form>
                @else
             <button wire:click="addGroup">
                 Додати групу
             </button>
         @endif
     </div>

     <div wire:sortable="sorting" wire:sortable-group="sorting" class="container row">
         @foreach($groups as $group)
                 <div wire:key="group-{{$group->id}}" wire:sortable.item="{{$group->id}}" class="card-body mb-4 rounded-3 shadow-sm" style="padding: 0 0 0 1em">
                 <div class="flex justify-between">
                     <h3 wire:sortable.handle class="list-group list-group-flush">{{$group->title}}</h3>
                     <button wire:click="deleteGroup({{$group->id}})" class="cursor-pointer inline-flex text-red">X</button>
                 </div>

                 <div>

                     <div wire:sortable-group.item-group="{{$group->id}}" class="pb-3">

                         @foreach($group->cards as $card)
                             <div wire:key="card-{{$card->id}}" wire:sortable-group.item="{{$card->id}}">
                                 <span class="list-group list-group-flush">{{$card->title}}</span>
                                 <button wire:click="deleteCard({{$card->id}})">x</button>
                             </div>
                         @endforeach
                     </div>

                     @if($addCard==$group->id)
                         <form wire:submit.prevent="save">
                             <input wire:model.defer="title" type="text" style="background-color: gray">
                         </form>
                     @else
                         <button wire:click="addCard({{$group->id}})" class="mt-3 cursor-pointer">
                             Додати
                         </button>
                     @endif
                 </div>
             </div>
         @endforeach
     </div>
</div>
