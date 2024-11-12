# OpenAI API Client in PHP

<br />

<br />

> ### ChatGPT API is currently supported, [click here](#chat-as-known-as-chatgpt-api) for the implementation introductions.

<br />

*A message from creator,<br />Thank you for visiting the __abdurazzoq/smart-text-ai__ repository! If you find this repository helpful or useful, we encourage you to **star** it
on GitHub. Starring a repository is a way to show your support for the project. It also helps to increase the visibility
of the project and to let the community know that it is valuable. Thanks again for your support and we hope you find the
repository useful! <br /><br /> Orhan*

<br />

<br />


[![Latest Version on Packagist](https://img.shields.io/packagist/v/abdurazzoq/smart-text-ai.svg?style=flat-square)](https://packagist.org/packages/abdurazzoq/smart-text-ai)
[![Total Downloads](https://img.shields.io/packagist/dt/abdurazzoq/smart-text-ai.svg?style=flat-square)](https://packagist.org/packages/abdurazzoq/smart-text-ai)


# Featured in


# Comparison With Other Packages

| Project Name           | Required PHP Version | Description                                                                                                                                                | Type (Official / Community) | Support                                                                                        |
|------------------------|----------------------|------------------------------------------------------------------------------------------------------------------------------------------------------------|----------------------------|------------------------------------------------------------------------------------------------|
| **abdurazzoq/smart-text-ai** | **PHP 7.4+**         | **Most downloaded, forked, contributed, huge community supported, and used PHP SDK for OpenAI GPT-3 and DALL-E. It also supports chatGPT-like streaming.** | Community                  | Available, (Personal mail [arasulmuhammedov07@gmail.com](mailto:arasulmuhammedov07@gmail.com)) |
| openai-** */c****t      | PHP 8.1+             | OpenAI and Other PHP API client.                                                                                                                           | Community                   | -                                                                                              |


<br />

## About this package

Fully open-source and secure community-maintained, PHP SDK for accessing the OpenAI GPT-3 API.

> #### To get started with this package, you'll first want to be familiar with the [OpenAI API documentation](https://platform.openai.com/docs/overview) and [examples](https://platform.openai.com/docs/examples)

> Requires PHP 7.4+

[//]: # (## Support this project)

[//]: # ()
[//]: # (As you may know, OpenAI PHP is an open-source project wrapping tool for OpenAI. We rely on the support of our community)

[//]: # (to continue developing and maintaining the project, and one way that you can help is by making a donation.)

[//]: # ()
[//]: # (Donations allow us to cover expenses such as hosting costs&#40;for testing&#41;, development tools, and other resources that are)

[//]: # (necessary to keep the project running smoothly. Every contribution, no matter how small, helps us to continue improving)

[//]: # (OpenAI PHP for everyone.)

[//]: # ()
[//]: # (If you have benefited from using OpenAI PHP and would like to support its continued development, we would greatly)

[//]: # (appreciate a donation of any amount. You can make a donation through;)

[//]: # ()
[//]: # (* [Buy me a coffee]&#40;https://www.buymeacoffee.com/)

[//]: # (* [Patreon]&#40;https://patreon.com/)

[//]: # ()
[//]: # (Thank you for considering a donation to abdurazzoq/smart-text-ai PHP SDK. Your support is greatly appreciated and helps to)

[//]: # (ensure that the project can continue to grow and improve.)

[//]: # ()
[//]: # (*Sincerely,*)

[//]: # ()
[//]: # (**Abdurazzoq** / Creator.)
[//]: # ()
[//]: # (# Documentation)

[//]: # ()
[//]: # ([//]: # &#40;Please visit https://orhanerday.gitbook.io/openai-php-api-1/&#41;)
[//]: # ()
[//]: # (# Endpoint Support)

[//]: # ()
[//]: # (- Chat)

[//]: # (    - [x] [ChatGPT API]&#40;#chat-as-known-as-chatgpt-api&#41;)

[//]: # (- Models)

[//]: # (    - [x] [List models]&#40;https://beta.openai.com/docs/api-reference/models/list&#41;)

[//]: # (    - [x] [Retrieve model]&#40;https://beta.openai.com/docs/api-reference/models/retrieve&#41;)

[//]: # (- Completions)

[//]: # (    - [x] [Create completion]&#40;https://beta.openai.com/docs/api-reference/completions/create&#41;)

[//]: # (- Edits)

[//]: # (    - [x] [Create edits]&#40;https://beta.openai.com/docs/api-reference/edits/create&#41;)

[//]: # (- Images)

[//]: # (    - [x] [Create image]&#40;https://beta.openai.com/docs/api-reference/images/create&#41;)

[//]: # (    - [x] [Create image edit]&#40;https://beta.openai.com/docs/api-reference/images/create-edit&#41;)

[//]: # (    - [x] [Create image variation]&#40;https://beta.openai.com/docs/api-reference/images/create-variation&#41;)

[//]: # (- Embeddings)

[//]: # (    - [x] [Create embeddings]&#40;https://beta.openai.com/docs/api-reference/embeddings/create&#41;)

[//]: # (- Audio)

[//]: # (    - [x] [Create transcription]&#40;https://platform.openai.com/docs/api-reference/audio/create&#41;)

[//]: # (    - [x] [Create translation]&#40;https://platform.openai.com/docs/api-reference/audio/create&#41;)

[//]: # (- Files)

[//]: # (    - [x] [List files]&#40;https://beta.openai.com/docs/api-reference/files/list&#41;)

[//]: # (    - [x] [Upload file]&#40;https://beta.openai.com/docs/api-reference/files/upload&#41;)

[//]: # (    - [x] [Delete file]&#40;https://beta.openai.com/docs/api-reference/files/delete&#41;)

[//]: # (    - [x] [Retrieve file]&#40;https://beta.openai.com/docs/api-reference/files/retrieve&#41;)

[//]: # (    - [x] [Retrieve file content]&#40;https://beta.openai.com/docs/api-reference/files/retrieve-content&#41;)

[//]: # (- Fine-tunes)

[//]: # (    - [x] [Create fine-tune &#40;beta&#41;]&#40;https://beta.openai.com/docs/api-reference/fine-tunes/create&#41;)

[//]: # (    - [x] [List fine-tunes &#40;beta&#41;]&#40;https://beta.openai.com/docs/api-reference/fine-tunes/list&#41;)

[//]: # (    - [x] [Retrieve fine-tune &#40;beta&#41;]&#40;https://beta.openai.com/docs/api-reference/fine-tunes/retrieve&#41;)

[//]: # (    - [x] [Cancel fine-tune &#40;beta&#41;]&#40;https://beta.openai.com/docs/api-reference/fine-tunes/cancel&#41;)

[//]: # (    - [x] [List fine-tune events &#40;beta&#41;]&#40;https://beta.openai.com/docs/api-reference/fine-tunes/events&#41;)

[//]: # (    - [x] [Delete fine-tune model &#40;beta&#41;]&#40;https://beta.openai.com/docs/api-reference/fine-tunes/delete-model&#41;)

[//]: # (- Moderation)

[//]: # (    - [x] [Create moderation]&#40;https://beta.openai.com/docs/api-reference/moderations/create&#41;)

[//]: # (- ~~Engines~~ *&#40;deprecated&#41;*)

[//]: # (    - ~~[List engines]&#40;https://beta.openai.com/docs/api-reference/engines/list&#41;~~)

[//]: # (    - ~~[Retrieve engine]&#40;https://beta.openai.com/docs/api-reference/engines/retrieve&#41;~~)

[//]: # ()
[//]: # (## Installation)

[//]: # ()
[//]: # (You can install the package via composer:)

[//]: # ()
[//]: # (```bash)

[//]: # (composer require abdurazzoq/smart-text-ai)

[//]: # (```)

[//]: # ()
[//]: # (## Quick Start ⚡)

[//]: # ()
[//]: # (Before you get starting, you should set OPENAI_API_KEY as ENV key, and set OpenAI key as env value with the following)

[//]: # (commands;)

[//]: # ()
[//]: # (_Powershell_)

[//]: # ()
[//]: # (```powershell)

[//]: # ($env:OPENAI_API_KEY = "sk-gjtv.....")

[//]: # (```)

[//]: # ()
[//]: # (_Cmd_)

[//]: # ()
[//]: # (```cmd)

[//]: # (set OPENAI_API_KEY=sk-gjtv.....)

[//]: # (```)

[//]: # ()
[//]: # (_Linux or macOS_)

[//]: # ()
[//]: # (```shell)

[//]: # (export OPENAI_API_KEY=sk-gjtv.....)

[//]: # (```)

[//]: # ()
[//]: # (> Getting issues while setting up env? Please read)

[//]: # (> the [article]&#40;https://help.openai.com/en/articles/5112595-best-practices-for-api-key-safety&#41; or you can check)

[//]: # (> my [StackOverflow answer]&#40;https://stackoverflow.com/a/73904271/15196622&#41; for the Windows® ENV setup.)

[//]: # ()
[//]: # (Create your `index.php` file and paste the following code part into the file.)

[//]: # ()
[//]: # (```php)

[//]: # (<?php)

[//]: # ()
[//]: # (require __DIR__ . '/vendor/autoload.php'; // remove this line if you use a PHP Framework.)

[//]: # ()
[//]: # (use Orhanerday\OpenAi\OpenAi;)

[//]: # ()
[//]: # ($open_ai_key = getenv&#40;'OPENAI_API_KEY'&#41;;)

[//]: # ($open_ai = new OpenAi&#40;$open_ai_key&#41;;)

[//]: # ()
[//]: # ($chat = $open_ai->chat&#40;[)

[//]: # (   'model' => 'gpt-3.5-turbo',)

[//]: # (   'messages' => [)

[//]: # (       [)

[//]: # (           "role" => "system",)

[//]: # (           "content" => "You are a helpful assistant.")

[//]: # (       ],)

[//]: # (       [)

[//]: # (           "role" => "user",)

[//]: # (           "content" => "Who won the world series in 2020?")

[//]: # (       ],)

[//]: # (       [)

[//]: # (           "role" => "assistant",)

[//]: # (           "content" => "The Los Angeles Dodgers won the World Series in 2020.")

[//]: # (       ],)

[//]: # (       [)

[//]: # (           "role" => "user",)

[//]: # (           "content" => "Where was it played?")

[//]: # (       ],)

[//]: # (   ],)

[//]: # (   'temperature' => 1.0,)

[//]: # (   'max_tokens' => 4000,)

[//]: # (   'frequency_penalty' => 0,)

[//]: # (   'presence_penalty' => 0,)

[//]: # (]&#41;;)

[//]: # ()
[//]: # ()
[//]: # (var_dump&#40;$chat&#41;;)

[//]: # (echo "<br>";)

[//]: # (echo "<br>";)

[//]: # (echo "<br>";)

[//]: # (// decode response)

[//]: # ($d = json_decode&#40;$chat&#41;;)

[//]: # (// Get Content)

[//]: # (echo&#40;$d->choices[0]->message->content&#41;;)

[//]: # (```)

[//]: # ()
[//]: # (_Run the server with the following command_)

[//]: # ()
[//]: # (```shell)

[//]: # (php -S localhost:8000 -t .)

[//]: # (```)

[//]: # ()
[//]: # (## Usage)

[//]: # ()
[//]: # (### Load your key from an environment variable.)

[//]: # ()
[//]: # (> According to the following code `$open_ai` is the base variable for all open-ai operations.)

[//]: # ()
[//]: # (```php)

[//]: # (use Orhanerday\OpenAi\OpenAi;)

[//]: # ()
[//]: # ($open_ai = new OpenAi&#40;env&#40;'OPEN_AI_API_KEY'&#41;&#41;;)

[//]: # (```)

[//]: # ()
[//]: # (## Requesting organization)

[//]: # ()
[//]: # (For users who belong to multiple organizations, you can pass a header to specify which organization is used for an API)

[//]: # (request.)

[//]: # (Usage from these API requests will count against the specified organization's subscription quota.)

[//]: # ()
[//]: # (````php)

[//]: # ($open_ai_key = getenv&#40;'OPENAI_API_KEY'&#41;;)

[//]: # ($open_ai = new OpenAi&#40;$open_ai_key&#41;;)

[//]: # ($open_ai->setORG&#40;"org-IKN2E1nI3kFYU8ywaqgFRKqi"&#41;;)

[//]: # (````)

[//]: # ()
[//]: # (## Base URL)

[//]: # ()
[//]: # (You can specify Origin URL with `setBaseURL&#40;&#41;` method;)

[//]: # ()
[//]: # (````php)

[//]: # ($open_ai_key = getenv&#40;'OPENAI_API_KEY'&#41;;)

[//]: # ($open_ai = new OpenAi&#40;$open_ai_key,$originURL&#41;;)

[//]: # ($open_ai->setBaseURL&#40;"https://ai.example.com/"&#41;;)

[//]: # (````)

[//]: # ()
[//]: # (## Use Proxy)

[//]: # ()
[//]: # (You can use some proxy servers for your requests api;)

[//]: # ()
[//]: # (````php)

[//]: # ($open_ai->setProxy&#40;"http://127.0.0.1:1086"&#41;;)

[//]: # (````)

[//]: # ()
[//]: # (## Set header)

[//]: # ()
[//]: # ( ```php)

[//]: # ($open_ai->setHeader&#40;["Connection"=>"keep-alive"]&#41;;)

[//]: # (```)

[//]: # ()
[//]: # (## Get cURL request info)

[//]: # ()
[//]: # (> ### !!! WARNING:Your API key will expose if you add this method to your code, therefore remove the method before deployment. Be careful !)

[//]: # (You can get cURL info after the request.)

[//]: # ()
[//]: # (````php)

[//]: # ($open_ai = new OpenAi&#40;$open_ai_key&#41;;)

[//]: # (echo $open_ai->listModels&#40;&#41;; // you should execute the request FIRST!)

[//]: # (var_dump&#40;$open_ai->getCURLInfo&#40;&#41;&#41;; // You can call the request)

[//]: # (````)

[//]: # ()
[//]: # (## Chat &#40;as known as ChatGPT API&#41;)

[//]: # ()
[//]: # (Given a chat conversation, the model will return a chat completion response.)

[//]: # ()
[//]: # ( ```php)

[//]: # ($complete = $open_ai->chat&#40;[)

[//]: # (    'model' => 'gpt-3.5-turbo',)

[//]: # (    'messages' => [)

[//]: # (        [)

[//]: # (            "role" => "system",)

[//]: # (            "content" => "You are a helpful assistant.")

[//]: # (        ],)

[//]: # (        [)

[//]: # (            "role" => "user",)

[//]: # (            "content" => "Who won the world series in 2020?")

[//]: # (        ],)

[//]: # (        [)

[//]: # (            "role" => "assistant",)

[//]: # (            "content" => "The Los Angeles Dodgers won the World Series in 2020.")

[//]: # (        ],)

[//]: # (        [)

[//]: # (            "role" => "user",)

[//]: # (            "content" => "Where was it played?")

[//]: # (        ],)

[//]: # (    ],)

[//]: # (    'temperature' => 1.0,)

[//]: # (    'max_tokens' => 4000,)

[//]: # (    'frequency_penalty' => 0,)

[//]: # (    'presence_penalty' => 0,)

[//]: # (]&#41;;)

[//]: # (```)

[//]: # ()
[//]: # (## Accessing the Element)

[//]: # ()
[//]: # (```php)

[//]: # (<?php)

[//]: # (// Dummy Response For Chat API )

[//]: # ($j = ')

[//]: # ({)

[//]: # (   "id":"chatcmpl-*****",)

[//]: # (   "object":"chat.completion",)

[//]: # (   "created":1679748856,)

[//]: # (   "model":"gpt-3.5-turbo-0301",)

[//]: # (   "usage":{)

[//]: # (      "prompt_tokens":9,)

[//]: # (      "completion_tokens":10,)

[//]: # (      "total_tokens":19)

[//]: # (   },)

[//]: # (   "choices":[)

[//]: # (      {)

[//]: # (         "message":{)

[//]: # (            "role":"assistant",)

[//]: # (            "content":"This is a test of the AI language model.")

[//]: # (         },)

[//]: # (         "finish_reason":"length",)

[//]: # (         "index":0)

[//]: # (      })

[//]: # (   ])

[//]: # (})

[//]: # (';)

[//]: # ()
[//]: # (// decode response)

[//]: # ($d = json_decode&#40;$j&#41;;)

[//]: # ()
[//]: # (// Get Content)

[//]: # (echo&#40;$d->choices[0]->message->content&#41;;)

[//]: # (```)

[//]: # ()
[//]: # (> ### Related: [ChatGPT Clone Project]&#40;#chatgpt-clone-project&#41;)

[//]: # ()
[//]: # (## Completions)

[//]: # ()
[//]: # (Given a prompt, the model will return one or more predicted completions, and can also return the probabilities of)

[//]: # (alternative tokens at each position.)

[//]: # ()
[//]: # ( ```php)

[//]: # ($complete = $open_ai->completion&#40;[)

[//]: # (    'model' => 'gpt-3.5-turbo-instruct',)

[//]: # (    'prompt' => 'Hello',)

[//]: # (    'temperature' => 0.9,)

[//]: # (    'max_tokens' => 150,)

[//]: # (    'frequency_penalty' => 0,)

[//]: # (    'presence_penalty' => 0.6,)

[//]: # (]&#41;;)

[//]: # (```)

[//]: # ()
[//]: # (### Stream Example)

[//]: # ()
[//]: # (This feature might sound familiar from [ChatGPT]&#40;https://chat.openai.com/chat&#41;.)

[//]: # ()
[//]: # (<hr>)

[//]: # ()
[//]: # (#### ChatGPT Clone Project)

[//]: # ()
[//]: # (Video of demo:)

[//]: # ()
[//]: # (https://user-images.githubusercontent.com/22305274/219878695-c76a58c0-5081-402c-a1b5-2b1fd971735a.mp4)

[//]: # ()
[//]: # (ChatGPT clone is a simple web application powered by the OpenAI library and built with PHP. It allows users to chat with)

[//]: # (an AI language model that responds in real-time. Chat history is saved using cookies, and the project requires the use)

[//]: # (of an API key and enabled SQLite3.)

[//]: # ()
[//]: # (Url of The ChatGPT-Clone Repo https://github.com/orhanerday/ChatGPT)

[//]: # ()
[//]: # (<hr>)

[//]: # ()
[//]: # (Whether to stream back partial progress. If set, tokens will be sent as)

[//]: # (data-only [server-sent events]&#40;https://developer.mozilla.org/en-US/docs/Web/API/Server-sent_events/Using_server-sent_events#event_stream_format&#41;)

[//]: # (as they become available, with the stream terminated by a data: [DONE] message.)

[//]: # ()
[//]: # ( ````php)

[//]: # ($open_ai = new OpenAi&#40;env&#40;'OPEN_AI_API_KEY'&#41;&#41;;)

[//]: # ()
[//]: # ($opts = [)

[//]: # (    'prompt' => "Hello",)

[//]: # (    'temperature' => 0.9,)

[//]: # (    "max_tokens" => 150,)

[//]: # (    "frequency_penalty" => 0,)

[//]: # (    "presence_penalty" => 0.6,)

[//]: # (    "stream" => true,)

[//]: # (];)

[//]: # ()
[//]: # (header&#40;'Content-type: text/event-stream'&#41;;)

[//]: # (header&#40;'Cache-Control: no-cache'&#41;;)

[//]: # ()
[//]: # ($open_ai->completion&#40;$opts, function &#40;$curl_info, $data&#41; {)

[//]: # (    echo $data . "<br><br>";)

[//]: # (    echo PHP_EOL;)

[//]: # (    ob_flush&#40;&#41;;)

[//]: # (    flush&#40;&#41;;)

[//]: # (    return strlen&#40;$data&#41;;)

[//]: # (}&#41;;)

[//]: # ()
[//]: # (````)

[//]: # ()
[//]: # (Add this part inside `<body>` of the HTML)

[//]: # ()
[//]: # ( ````php)

[//]: # ( )
[//]: # (<div id="divID">Hello</div>)

[//]: # (<script>)

[//]: # (    var eventSource = new EventSource&#40;"/"&#41;;)

[//]: # (    var div = document.getElementById&#40;'divID'&#41;;)

[//]: # ()
[//]: # ()
[//]: # (    eventSource.onmessage = function &#40;e&#41; {)

[//]: # (       if&#40;e.data == "[DONE]"&#41;)

[//]: # (       {)

[//]: # (           div.innerHTML += "<br><br>Hello";)

[//]: # (       })

[//]: # (        div.innerHTML += JSON.parse&#40;e.data&#41;.choices[0].text;)

[//]: # (    };)

[//]: # (    eventSource.onerror = function &#40;e&#41; {)

[//]: # (        console.log&#40;e&#41;;)

[//]: # (    };)

[//]: # (</script>)

[//]: # (````)

[//]: # ()
[//]: # (You should see a response like the in video;)

[//]: # ()
[//]: # (https://user-images.githubusercontent.com/22305274/209847128-f72c9345-dd34-46f0-bbc5-daf1d7b6121f.mp4)

[//]: # ()
[//]: # (## Edits)

[//]: # ()
[//]: # (Creates a new edit for the provided input, instruction, and parameters)

[//]: # ()
[//]: # ( ```php)

[//]: # (    $result = $open_ai->createEdit&#40;[)

[//]: # (        "model" => "text-davinci-edit-001",)

[//]: # (        "input" => "What day of the wek is it?",)

[//]: # (        "instruction" => "Fix the spelling mistakes",)

[//]: # (    ]&#41;;)

[//]: # (```)

[//]: # ()
[//]: # (## Images &#40;DALL·E&#41;)

[//]: # ()
[//]: # (> All DALL·E Examples available in this [repo]&#40;https://github.com/orhanerday/DALLE-Examples&#41;.)

[//]: # ()
[//]: # (Given a prompt, the model will return one or more generated images as urls or base64 encoded.)

[//]: # ()
[//]: # (### Create image)

[//]: # ()
[//]: # (Creates an image given a prompt.)

[//]: # ()
[//]: # ( ```php)

[//]: # ($complete = $open_ai->image&#40;[)

[//]: # (    "prompt" => "A cat drinking milk",)

[//]: # (    "n" => 1,)

[//]: # (    "size" => "256x256",)

[//]: # (    "response_format" => "url",)

[//]: # (]&#41;;)

[//]: # (```)

[//]: # ()
[//]: # (### Create image edit)

[//]: # ()
[//]: # (Creates an edited or extended image given an original image and a prompt.)

[//]: # (> You need HTML upload for image edit or variation? Please)

[//]: # (> check [DALL·E Examples]&#40;https://github.com/orhanerday/DALLE-Examples&#41;)

[//]: # ()
[//]: # (````php)

[//]: # ($otter = curl_file_create&#40;__DIR__ . './files/otter.png'&#41;;)

[//]: # ($mask = curl_file_create&#40;__DIR__ . './files/mask.jpg'&#41;;)

[//]: # ()
[//]: # ($result = $open_ai->imageEdit&#40;[)

[//]: # (    "image" => $otter,)

[//]: # (    "mask" => $mask,)

[//]: # (    "prompt" => "A cute baby sea otter wearing a beret",)

[//]: # (    "n" => 2,)

[//]: # (    "size" => "1024x1024",)

[//]: # (]&#41;;)

[//]: # (````)

[//]: # ()
[//]: # (### Create image variation)

[//]: # ()
[//]: # (Creates a variation of a given image.)

[//]: # ()
[//]: # (````php)

[//]: # ($otter = curl_file_create&#40;__DIR__ . './files/otter.png'&#41;;)

[//]: # ()
[//]: # ($result = $open_ai->createImageVariation&#40;[)

[//]: # (    "image" => $otter,)

[//]: # (    "n" => 2,)

[//]: # (    "size" => "256x256",)

[//]: # (]&#41;;)

[//]: # (````)

[//]: # ()
[//]: # (## Searches)

[//]: # ()
[//]: # (**_&#40;Deprecated&#41;_**)

[//]: # (> This endpoint is deprecated and will be removed on December 3rd, 2022)

[//]: # (> OpenAI developed new methods with better)

[//]: # (> performance. [Learn more.]&#40;https://help.openai.com/en/articles/6272952-search-transition-guide&#41;)

[//]: # ()
[//]: # (Given a query and a set of documents or labels, the model ranks each document based on its semantic similarity to the)

[//]: # (provided query.)

[//]: # ()
[//]: # (```php)

[//]: # ($search = $open_ai->search&#40;[)

[//]: # (    'engine' => 'ada',)

[//]: # (    'documents' => ['White House', 'hospital', 'school'],)

[//]: # (    'query' => 'the president',)

[//]: # (]&#41;;)

[//]: # (```)

[//]: # ()
[//]: # (## Embeddings)

[//]: # ()
[//]: # (Get a vector representation of a given input that can be easily consumed by machine learning models and algorithms.)

[//]: # ()
[//]: # (Related guide: [Embeddings]&#40;https://beta.openai.com/docs/guides/embeddings&#41;)

[//]: # ()
[//]: # (### Create embeddings)

[//]: # ()
[//]: # (```php)

[//]: # ($result = $open_ai->embeddings&#40;[)

[//]: # (    "model" => "text-similarity-babbage-001",)

[//]: # (    "input" => "The food was delicious and the waiter...")

[//]: # (]&#41;;)

[//]: # (```)

[//]: # ()
[//]: # (## Answers)

[//]: # ()
[//]: # (**_&#40;Deprecated&#41;_**)

[//]: # ()
[//]: # (> This endpoint is deprecated and will be removed on December 3rd, 2022)

[//]: # (> We’ve developed new methods with better)

[//]: # (> performance. [Learn more]&#40;https://help.openai.com/en/articles/6233728-answers-transition-guide&#41;.)

[//]: # ()
[//]: # (Given a question, a set of documents, and some examples, the API generates an answer to the question based on the)

[//]: # (information in the set of documents. This is useful for question-answering applications on sources of truth, like)

[//]: # (company documentation or a knowledge base.)

[//]: # ()
[//]: # (  ```php)

[//]: # ($answer = $open_ai->answer&#40;[)

[//]: # (    'documents' => ['Puppy A is happy.', 'Puppy B is sad.'],)

[//]: # (    'question' => 'which puppy is happy?',)

[//]: # (    'search_model' => 'ada',)

[//]: # (    'model' => 'curie',)

[//]: # (    'examples_context' => 'In 2017, U.S. life expectancy was 78.6 years.',)

[//]: # (    'examples' => [['What is human life expectancy in the United States?', '78 years.']],)

[//]: # (    'max_tokens' => 5,)

[//]: # (    'stop' => ["\n", '<|endoftext|>'],)

[//]: # (]&#41;;)

[//]: # (```)

[//]: # ()
[//]: # (## Classifications)

[//]: # ()
[//]: # (**_&#40;Deprecated&#41;_**)

[//]: # (> This endpoint is deprecated and will be removed on December 3rd, 2022)

[//]: # (> OpenAI developed new methods with better)

[//]: # (> performance. [Learn more.]&#40;https://help.openai.com/en/articles/6272941-classifications-transition-guide&#41;)

[//]: # ()
[//]: # (Given a query and a set of labeled examples, the model will predict the most likely label for the query. Useful as a)

[//]: # (drop-in replacement for any ML classification or text-to-label task.)

[//]: # ()
[//]: # ( ```php)

[//]: # ($classification = $open_ai->classification&#40;[)

[//]: # (    'examples' => [)

[//]: # (        ['A happy moment', 'Positive'],)

[//]: # (        ['I am sad.', 'Negative'],)

[//]: # (        ['I am feeling awesome', 'Positive'],)

[//]: # (    ],)

[//]: # (    'labels' => ['Positive', 'Negative', 'Neutral'],)

[//]: # (    'query' => 'It is a raining day =>&#40;',)

[//]: # (    'search_model' => 'ada',)

[//]: # (    'model' => 'curie',)

[//]: # (]&#41;;)

[//]: # (```)

[//]: # ()
[//]: # (## Content Moderations)

[//]: # ()
[//]: # (Given a input text, outputs if the model classifies it as violating OpenAI's content policy.)

[//]: # ()
[//]: # (```php)

[//]: # ($flags = $open_ai->moderation&#40;[)

[//]: # (    'input' => 'I want to kill them.')

[//]: # (]&#41;;)

[//]: # (```)

[//]: # ()
[//]: # (Know more about Content Moderations here: [OpenAI Moderations]&#40;https://beta.openai.com/docs/api-reference/moderations&#41;)

[//]: # ()
[//]: # (## List engines)

[//]: # ()
[//]: # (**_&#40;Deprecated&#41;_**)

[//]: # ()
[//]: # (> The Engines endpoints are deprecated.)

[//]: # (> Please use their replacement, [Models]&#40;#list-models&#41;, instead. [Learn more]&#40;TODO?&#41;.)

[//]: # ()
[//]: # (Lists the currently available engines, and provides basic information about each one such as the owner and availability.)

[//]: # ()
[//]: # ( ```php)

[//]: # ($engines = $open_ai->engines&#40;&#41;;)

[//]: # (```)

[//]: # ()
[//]: # (## Audio)

[//]: # ()
[//]: # (### Create Transcription)

[//]: # ()
[//]: # (Transcribes audio into the input language.)

[//]: # ()
[//]: # (```php)

[//]: # ($c_file = curl_file_create&#40;__DIR__ . '/files/en-marvel-endgame.m4a'&#41;;)

[//]: # ()
[//]: # ($result = $open_ai->transcribe&#40;[)

[//]: # (    "model" => "whisper-1",)

[//]: # (    "file" => $c_file,)

[//]: # (]&#41;;)

[//]: # (```)

[//]: # (#### Response)

[//]: # ()
[//]: # (```json)

[//]: # ({)

[//]: # (  "text": "I'm going to use the stones again. Hey, we'd be going in short-handed, you know. Look, he's still got the stones, so... So let's get them. Use them to bring everyone back. Just like that? Yeah, just like that. Even if there's a small chance that we can undo this, I mean, we owe it to everyone who's not in this room to try. If we do this, how do we know it's going to end any differently than it did before? Because before you didn't have me. Hey, little girl, everybody in this room is about that superhero life. And if you don't mind my asking, where the hell have you been all this time? There are a lot of other planets in the universe. But unfortunately, they didn't have you guys. I like this one. Let's go get this son of a bitch.")

[//]: # (})

[//]: # (```)

[//]: # ()
[//]: # (### Create Translation)

[//]: # ()
[//]: # (Translates audio into English.)

[//]: # ()
[//]: # (_I use Turkish voice for translation thanks to famous science YouTuber [Barış Özcan]&#40;https://youtu.be/r2dQgdktUJg?t=90&#41;_)

[//]: # ()
[//]: # (```php)

[//]: # ($c_file = curl_file_create&#40;__DIR__ . '/files/tr-baris-ozcan-youtuber.m4a'&#41;;)

[//]: # ()
[//]: # ($result = $open_ai->translate&#40;[)

[//]: # (    "model" => "whisper-1",)

[//]: # (    "file" => $c_file,)

[//]: # (]&#41;;)

[//]: # (```)

[//]: # (#### Response)

[//]: # ()
[//]: # (```json)

[//]: # ({)

[//]: # (  "text": "GPT-3. Last month, the biggest leap in the world of artificial intelligence in recent years happened silently. Maybe the biggest leap of all time. GPT-3's beta version was released by OpenAI. When you hear such a sentence, you may think, what kind of leap is this? But be sure, this is the most advanced language model with the most advanced language model with the most advanced language ability. It can answer these artificial intelligence questions, it can translate and even write poetry. Those who have gained access to the API or API of GPT-3 have already started to make very interesting experiments. Let's look at a few examples together. Let's start with an example of aphorism. This site produces beautiful words that you can tweet. Start to actually do things with your words instead of just thinking about them.")

[//]: # (})

[//]: # (```)

[//]: # ()
[//]: # (#### Need HTML upload for audio? Check [this]&#40;#upload-file-with-html-form&#41; section and change api references. Example :)

[//]: # ()
[//]: # (```php)

[//]: # (...)

[//]: # (    echo $open_ai->translate&#40;)

[//]: # (        [)

[//]: # (            "purpose" => "answers",)

[//]: # (            "file" => $c_file,)

[//]: # (        ])

[//]: # (    &#41;;)

[//]: # (...)

[//]: # (// OR)

[//]: # (...)

[//]: # (    echo $open_ai->transcribe&#40;)

[//]: # (        [)

[//]: # (            "purpose" => "answers",)

[//]: # (            "file" => $c_file,)

[//]: # (        ])

[//]: # (    &#41;;)

[//]: # (...)

[//]: # (```)

[//]: # ()
[//]: # (## Files)

[//]: # ()
[//]: # (Files are used to upload documents that can be used across features like Answers, Search, and Classifications)

[//]: # ()
[//]: # (### List files)

[//]: # ()
[//]: # (Returns a list of files that belong to the user's organization.)

[//]: # ()
[//]: # (```php)

[//]: # ($files = $open_ai->listFiles&#40;&#41;;)

[//]: # (```)

[//]: # ()
[//]: # (### Upload file)

[//]: # ()
[//]: # (Upload a file that contains document&#40;s&#41; to be used across various endpoints/features. Currently, the size of all the)

[//]: # (files uploaded by one organization can be up to 1 GB. Please contact OpenAI if you need to increase the storage limit.)

[//]: # ()
[//]: # (```php)

[//]: # ($c_file = curl_file_create&#40;__DIR__ . 'files/sample_file_1.jsonl'&#41;;)

[//]: # ($result = $open_ai->uploadFile&#40;[)

[//]: # (            "purpose" => "answers",)

[//]: # (            "file" => $c_file,)

[//]: # (]&#41;;)

[//]: # (```)

[//]: # ()
[//]: # (### Upload file with HTML Form)

[//]: # ()
[//]: # (```php)

[//]: # (<form action="index.php" method="post" enctype="multipart/form-data">)

[//]: # (    Select file to upload:)

[//]: # (    <input type="file" name="fileToUpload" id="fileToUpload">)

[//]: # (    <input type="submit" value="Upload File" name="submit">)

[//]: # (</form>)

[//]: # (<?php)

[//]: # (require __DIR__ . '/vendor/autoload.php';)

[//]: # ()
[//]: # (use Orhanerday\OpenAi\OpenAi;)

[//]: # ()
[//]: # (if &#40;$_SERVER['REQUEST_METHOD'] == 'POST'&#41; {)

[//]: # (    ob_clean&#40;&#41;;)

[//]: # (    $open_ai = new OpenAi&#40;env&#40;'OPEN_AI_API_KEY'&#41;&#41;;)

[//]: # (    $tmp_file = $_FILES['fileToUpload']['tmp_name'];)

[//]: # (    $file_name = basename&#40;$_FILES['fileToUpload']['name']&#41;;)

[//]: # (    $c_file = curl_file_create&#40;$tmp_file, $_FILES['fileToUpload']['type'], $file_name&#41;;)

[//]: # ()
[//]: # (    echo "[";)

[//]: # (    echo $open_ai->uploadFile&#40;)

[//]: # (        [)

[//]: # (            "purpose" => "answers",)

[//]: # (            "file" => $c_file,)

[//]: # (        ])

[//]: # (    &#41;;)

[//]: # (    echo ",";)

[//]: # (    echo $open_ai->listFiles&#40;&#41;;)

[//]: # (    echo "]";)

[//]: # ()
[//]: # (})

[//]: # ()
[//]: # (```)

[//]: # ()
[//]: # (### Delete file)

[//]: # ()
[//]: # ( ```php)

[//]: # ($result = $open_ai->deleteFile&#40;'file-xxxxxxxx'&#41;;)

[//]: # (```)

[//]: # ()
[//]: # (### Retrieve file)

[//]: # ()
[//]: # ( ```php)

[//]: # ($file = $open_ai->retrieveFile&#40;'file-xxxxxxxx'&#41;;)

[//]: # (```)

[//]: # ()
[//]: # (### Retrieve file content)

[//]: # ()
[//]: # ( ```php)

[//]: # ($file = $open_ai->retrieveFileContent&#40;'file-xxxxxxxx'&#41;;)

[//]: # (```)

[//]: # ()
[//]: # (## Fine-tunes)

[//]: # ()
[//]: # (Manage fine-tuning jobs to tailor a model to your specific training data.)

[//]: # ()
[//]: # (### Create fine-tune)

[//]: # ()
[//]: # ( ```php)

[//]: # ($result = $open_ai->createFineTune&#40;[)

[//]: # (        "model" => "gpt-3.5-turbo-1106",)

[//]: # (        "training_file" => "file-U3KoAAtGsjUKSPXwEUDdtw86",)

[//]: # (]&#41;;)

[//]: # (```)

[//]: # ()
[//]: # (### List fine-tune)

[//]: # ()
[//]: # ( ```php)

[//]: # ($fine_tunes = $open_ai->listFineTunes&#40;&#41;;)

[//]: # (```)

[//]: # ()
[//]: # (### Retrieve fine-tune)

[//]: # ()
[//]: # ( ```php)

[//]: # ($fine_tune = $open_ai->retrieveFineTune&#40;'ft-AF1WoRqd3aJAHsqc9NY7iL8F'&#41;;)

[//]: # (```)

[//]: # ()
[//]: # (### Cancel fine-tune)

[//]: # ()
[//]: # ( ```php)

[//]: # ($result = $open_ai->cancelFineTune&#40;'ft-AF1WoRqd3aJAHsqc9NY7iL8F'&#41;;)

[//]: # (```)

[//]: # ()
[//]: # (### List fine-tune events)

[//]: # ()
[//]: # ( ```php)

[//]: # ($fine_tune_events = $open_ai->listFineTuneEvents&#40;'ft-AF1WoRqd3aJAHsqc9NY7iL8F'&#41;;)

[//]: # (```)

[//]: # ()
[//]: # (### Delete fine-tune model)

[//]: # ()
[//]: # ( ```php)

[//]: # ($result = $open_ai->deleteFineTune&#40;'curie:ft-acmeco-2021-03-03-21-44-20'&#41;;)

[//]: # (```)

[//]: # ()
[//]: # (## Retrieve engine)

[//]: # ()
[//]: # (**_&#40;Deprecated&#41;_**)

[//]: # ()
[//]: # (Retrieves an engine instance, providing basic information about the engine such as the owner and availability.)

[//]: # ()
[//]: # ( ```php)

[//]: # ($engine = $open_ai->engine&#40;'davinci'&#41;;)

[//]: # (```)

[//]: # ()
[//]: # (## Models)

[//]: # ()
[//]: # (List and describe the various models available in the API.)

[//]: # ()
[//]: # (### List models)

[//]: # ()
[//]: # (Lists the currently available models, and provides basic information about each one such as the owner and availability.)

[//]: # ()
[//]: # ( ```php)

[//]: # ($result = $open_ai->listModels&#40;&#41;;)

[//]: # (```)

[//]: # ()
[//]: # (### Retrieve model)

[//]: # ()
[//]: # (Retrieves a model instance, providing basic information about the model such as the owner and permissioning.)

[//]: # ()
[//]: # ( ```php)

[//]: # ($result = $open_ai->retrieveModel&#40;"text-ada-001"&#41;;)

[//]: # (```)

[//]: # ()
[//]: # (## Printing results *i.e.* `$search`)

[//]: # ()
[//]: # ( ```php)

[//]: # (echo $search;)

[//]: # (```)

[//]: # ()
[//]: # (## Testing)

[//]: # ()
[//]: # (To run all tests:)

[//]: # ()
[//]: # (```bash)

[//]: # (composer test)

[//]: # (```)

[//]: # ()
[//]: # (To run only those tests that work for most user &#40;exclude those that require a missing folder or that hit deprecated)

[//]: # (endpoints no longer available to most users&#41;:)

[//]: # ()
[//]: # (```bash)

[//]: # (./vendor/bin/pest --group=working)

[//]: # (```)

[//]: # ()
[//]: # (## Changelog)

[//]: # ()
[//]: # (Please see [CHANGELOG]&#40;CHANGELOG.md&#41; for more information on what has changed recently.)

[//]: # ()
[//]: # (## Contributing)

[//]: # ()
[//]: # (Please see [CONTRIBUTING]&#40;.github/CONTRIBUTING.md&#41; for details.)

[//]: # ()
[//]: # (## Security Vulnerabilities)

[//]: # ()
[//]: # (Please report security vulnerabilities to [orhanerday@gmail.com]&#40;mailto:orhanerday@gmail.com&#41;)

[//]: # ()
[//]: # (## Credits)

[//]: # ()
[//]: # (- [Orhan Erday]&#40;https://github.com/orhanerday&#41;)

[//]: # (- [All Contributors]&#40;../../contributors&#41;)

[//]: # ()
[//]: # (## License)

[//]: # ()
[//]: # (The MIT License &#40;MIT&#41;. Please see [License File]&#40;LICENSE.md&#41; for more information.)

[//]: # ()
[//]: # (## Donation)

[//]: # ()
[//]: # (<a href="https://www.buymeacoffee.com/orhane" target="_blank"><img src="https://www.buymeacoffee.com/assets/img/custom_images/orange_img.png" alt="Buy Me A Coffee" style="height: 41px !important;width: 174px !important;box-shadow: 0px 3px 2px 0px rgba&#40;190, 190, 190, 0.5&#41; !important;-webkit-box-shadow: 0px 3px 2px 0px rgba&#40;190, 190, 190, 0.5&#41; !important;" ></a>)

[//]: # ()
[//]: # (#### btc)

[//]: # ()
[//]: # (![image]&#40;https://user-images.githubusercontent.com/22305274/209946578-fc7db433-699c-491f-9f8b-1c962f0b9ea2.png&#41;)

[//]: # ()
[//]: # (#### eth)

[//]: # ()
[//]: # (![image]&#40;https://user-images.githubusercontent.com/22305274/209946539-24f247d9-68a1-4f46-a18b-62790d943c99.png&#41;)

[//]: # ()
[//]: # (#### doge)

[//]: # ()
[//]: # (![image]&#40;https://user-images.githubusercontent.com/22305274/209946556-164798d0-e404-4b6c-8669-d63e78f24228.png&#41;)

[//]: # ()
[//]: # (## Star History)

[//]: # ()
[//]: # ([![Star History Chart]&#40;https://api.star-history.com/svg?repos=abdurazzoq/smart-text-ai&type=Date&#41;]&#40;https://star-history.com/#abdurazzoq/smart-text-ai&Date&#41;)
