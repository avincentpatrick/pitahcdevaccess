<div>
    <div>
        @if (session()->has('message'))
            <div class="alert alert-success">{{ session('message') }}</div>
        @endif
    
        <form wire:submit.prevent="save">
            <div class="form-group">
                <label for="pdf">Upload PDF:</label>
                <input type="file" id="pdf" wire:model="pdf" class="form-control">
                @error('pdf') <span class="text-danger">{{ $message }}</span> @enderror
            </div>
    
            <button type="submit" class="btn btn-primary">Upload</button>
        </form>
    
        <div wire:loading wire:target="pdf">Uploading...</div>
    </div>
</div>
