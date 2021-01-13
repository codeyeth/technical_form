@extends('layouts.template')

@section('content')
<div class="user-profile">    
    <div class="user-profile__sidebar">
        
        <h3 class="user-profile__username">Request Form </h3>
        
        @include('inc.messages')
        
        @livewire('request-form')
        
    </div>
    
    <div id="app">
        @guest
        <request-list-component> </request-list-component>
        @else
        <request-list-component :authgood="true"> </request-list-component>
        @endguest
    </div>
    
</div>

<style scoped>
    
    .required {
        content: "*";
        color: red;
    }
    
    .totalCount {
        color: red;
    }
    
    .requestCount{
        text-align: right;
    }
    
    .user-profile {
        display: grid;
        grid-template-columns: 1fr 3fr;
        grid-gap: 50px;
        padding: 50px 5%;
    }
    
    textarea {
        resize: none;
    }
    
    .user-profile__user-panel {
        display: flex;
        flex-direction: column;
        padding: 20px;
        background-color: white;
        border-radius: 5px;
        border: 1px solid #dfe3eb;
    }
    
    h1 {
        margin: 0;
    }
    
    .user-profile__admin-badge {
        background: purple;
        color: white;
        border-radius: 5px;
        margin-right: auto;
        padding: 0 10px;
        font-weight: bold;
    }
    .user-profile__twoots-wrapper {
        display: grid;
        grid-gap: 10px;
    }
    
    .user-profile__create-twoot {
        padding-top: 20px;
        display: flex;
        flex-direction: column;
    }
    
    .--exceeded {
        color: red;
        border-color: red;
    }
    
    .create-twoot-panel {
        /* margin-top: 20px;
        padding: 20px 0; */
        display: flex;
        flex-direction: column;
    }
    
    .create-twoot-panel1 {
        margin-top: 20px;
        padding: 20px 0;
        display: flex;
        flex-direction: column;
    }
    
    textarea {
        border: 1px solid #dfe3e8;
        border-radius: 5px;
    }
    
    .create-twoot-panel__submit {
        display: flex;
        justify-content: space-between;
    }
    
    .create-twoot-type {
        padding: 10px 0;
    }
    
    .btn {
        padding: 5px 20px;
        margin: auto 0;
        border-radius: 1px;
        border: none;
        background-color: #4682b4;
        color: white;
        font-weight: bold;
        cursor: pointer;
    }
    .twoot-item {
        padding: 20px;
        background-color: white;
        border-radius: 5px;
        border: 1px solid #dfe3e8;
        box-sizing: border-box;
        cursor: pointer;
        transition: all 0.25s ease;
    }
    
    .item_new {
        padding: 5px 20px;
        font-weight: bold;
        background-color: red;
        color: white;
    }
    
    .item_done {
        padding: 5px 20px;
        font-weight: bold;
        background-color: #06a40b;
        color: white;
    }
    
    .tsNo {
        padding: 5px 20px;
        font-weight: bold;
        background-color: #4682b4;
        color: white;
    }
    
    .item_old {
        display: none;
    }
    .twoot-item:hover {
        transform: scale(1.1, 1.1);
    }
    
    .twoot-item__content {
        /* display: grid;
        grid-gap: 50px;
        grid-template-columns: 3fr 1fr; */
        padding: 10px 5%;
        
    }
</style>

@endsection

