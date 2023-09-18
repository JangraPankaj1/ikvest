<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\User;

class SidebarLoadMore extends Component
  {


        public $perPage = 5; // Number of items to load per page
        public $page = 1;    // Current page
        public $users;       // Data to display

        public function loadMore()
        {
            $this->page++; // Increment the current page
            $this->loadUsers();
        }

        public function render()
        {
            $this->loadUsers(); // Load initial data
            return view('livewire.sidebar-load-more');
        }

        private function loadUsers()
        {
            $query = User::query()
                ->where('parent_id', auth()->user()->id)
                ->take($this->perPage)
                ->skip(($this->page - 1) * $this->perPage);

            $this->users = $query->get();

            if ($this->users->isEmpty()) {
                $this->emit('noMoreData'); // Emit an event to notify there is no more data
            }
        }

        
}
