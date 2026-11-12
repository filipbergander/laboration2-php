      <form method="post" class="rounded-xl bg-green-200 shadow-md p-6 backdrop-blur-3xl">
          <fieldset class="space-y-5">
              <legend class="mb-4 text-xl font-semibold">Lägg till en ny sak i din Bucketlist</legend>
              <div>
                  <label for="name" class="block text-md font-medium mb-1">Skriv namn:</label>
                  <input type="text" id="name" name="name" class="bg-white rounded-md p-2 w-full" placeholder="Vad vill du göra?">
              </div>
              <div>
                  <label class="block text-md font-medium mb-1" for="description">Skriv beskrivning:</label>
                  <textarea name="description" class="w-full p-2 resize-y bg-white rounded-md focus:border-green-300" rows="10" placeholder="Beskriv vad du vill uppleva" required id="description"></textarea>
              </div>
              <div class="mb-6">
                  <label for="priority" class="block text-md font-medium mb-1">Välj prioritet:</label>
                  <select id="priority" name="priority" class="rounded-md bg-white border p-2 cursor-pointer">
                      <option value="1">1 - Hög</option>
                      <option value="2">2 - Medel</option>
                      <option value="3">3 - Låg</option>
                  </select>
              </div>
              <div class="flex justify-center w-full mt-6">
                  <button
                      id="reset-btn"
                      type="reset"
                      class="flex items-center gap-1 w-fit p-2 bg-gray-200 border-2 hover:bg-white text-gray-800 rounded-md transition-colors duration-200 ease-in-out cursor-pointer">
                      <span class="material-symbols-outlined">
                          refresh
                      </span>
                      Återställ formulär
                  </button>
              </div>
              <div class="flex justify-center gap-5">
                  <button type="submit" class="flex items-center gap-1 w-fit bg-blue-700 hover:bg-green-800 text-white font-bold py-4 px-4 mt-4 text-center rounded cursor-pointer transition-colors duration-200 ease-in-out"><span class="material-symbols-outlined">
                          add
                      </span>Lägg till sak</button>
                  <button type="button" id="cancel-btn" class="flex items-center gap-1 w-fit bg-gray-600 hover:bg-gray-800 text-white font-bold py-2 px-4 mt-4 text-center rounded cursor-pointer transition-colors duration-200 ease-in-out"><span class="material-symbols-outlined">
                          hide
                      </span>Stäng formulär</button>
              </div>
              <button type="button" aria-label="Stäng formulär" id="close-modal" class="absolute top-0 right-0 p-2 cursor-pointer"><span class="material-symbols-outlined text-4xl">
                      close
                  </span></button>
          </fieldset>
      </form>