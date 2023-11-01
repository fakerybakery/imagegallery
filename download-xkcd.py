import os
import requests
import json

# Define the URL for the XKCD API
api_url = "https://xkcd.com/info.0.json"

# Create a directory to store the comics
os.makedirs("image", exist_ok=True)
os.makedirs("title", exist_ok=True)
os.makedirs("alt", exist_ok=True)

# Get information about the latest XKCD comic
response = requests.get(api_url)
latest_comic_info = response.json()

# Download the 100 most recent comics
for comic_num in range(latest_comic_info['num'], latest_comic_info['num'] - 100, -1):
    # Build the URL for the specific comic
    comic_url = f"https://xkcd.com/{comic_num}/info.0.json"
    
    # Fetch the comic data
    response = requests.get(comic_url)
    comic_data = response.json()
    
    # Get the image URL
    image_url = comic_data['img']
    
    # Download and save the image
    image_response = requests.get(image_url)
    if image_response.status_code == 200:
        image_filename = f"{comic_data['num']}.png"
        image_path = os.path.join("image", image_filename)
        with open(image_path, 'wb') as image_file:
            image_file.write(image_response.content)
        with open(os.path.join("title", str(comic_data['num']) + ".txt"), 'w') as image_file:
            image_file.write(comic_data['title'])
        with open(os.path.join("alt", str(comic_data['num']) + ".txt"), 'w') as image_file:
            image_file.write(comic_data['alt'])
        
        print(f"Downloaded: {comic_data['safe_title']}")

print("Downloaded 100 most recent XKCD comics to 'xkcd' folder.")
