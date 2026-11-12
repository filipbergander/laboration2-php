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
              <div class="flex justify-center gap-5">
                  <button type="submit" class="w-fit bg-blue-700 hover:bg-blue-900 text-white font-bold py-4 px-4 mt-4 text-center rounded cursor-pointer transition-colors duration-200 ease-in-out">Lägg till sak</button>
                  <button type="button" id="cancel-btn" class="w-fit bg-gray-600 hover:bg-gray-800 text-white font-bold py-2 px-4 mt-4 text-center rounded cursor-pointer transition-colors duration-200 ease-in-out">Stäng formulär</button>
              </div>
          </fieldset>
      </form>