import re
import Long_Responses as long


def message_probability(user_message, recognised_words, single_response=False, required_words=[]):
    message_certainty = 0
    has_required_words = True

    # Counts how many words are present in each predefined message
    for word in user_message:
        if word in recognised_words:
            message_certainty += 1

    # Calculates the percent of recognised words in a user message
    percentage = float(message_certainty) / float(len(recognised_words))

    # Checks that the required words are in the string
    for word in required_words:
        if word not in user_message:
            has_required_words = False
            break

    # Must either have the required words, or be a single response
    if has_required_words or single_response:
        return int(percentage * 100)
    else:
        return 0


def check_all_messages(message):
    highest_prob_list = {}

    # Simplifies response creation / adds it to the dict
    def response(bot_response, list_of_words, single_response=False, required_words=[]):
        nonlocal highest_prob_list
        highest_prob_list[bot_response] = message_probability(message, list_of_words, single_response, required_words)

    # Responses -------------------------------------------------------------------------------------------------------
    response('Hello!How may I help you ?', ['hello', 'hi', 'hey', 'sup', 'heyo'], single_response=True)
    response('Which transport service you want ? Air/Train/Bus/Taxi ?', ['book', 'reservation', 'seat', 'reserve'], single_response=True)
    response('Ok great ! Could you please give your current location and destination?', ['Taxi', 'taxy'], single_response=True)
    response('Ok great ! Could you please give your Start location/city and Destination?', ['Bus', 'bus'], single_response=True)
    response('Ok great ! Could you please give your Start location/city and Destination?', ['Train', 'train'], single_response=True)
    response('Ok great ! Could you please give your Start location/city and Destination?', ['air', 'Air'], single_response=True)
    response('Could you please give me your resevation number?', ['change', 'cancel', 'refund'], single_response=True)
    response('Could you please give me your refund confirmation number?', ['I', 'want', 'to', 'change'], required_words=['refund'])
    response('Yes ! We have some exclusive offer for frequent traveller like you?', ['offer', 'discount'], single_response=True)
    response('We allow kids for free (0-5 years), 5-12 years will have to pay 50% ?', ['kid'], single_response=True)
    response('Yes ! You are allowed to take pet with you ?', ['pet'], single_response=True)
    response('We provide veg and non-veg, which one is your preferred manue?', ['food'], single_response=True)
    response('', ['how', 'are', 'you', 'doing'], required_words=['how'])
    response('See you!', ['bye', 'goodbye'], single_response=True)
    response('You\'re welcome!', ['thank', 'thanks'], single_response=True)
    response('Thank you!', ['i', 'love', 'code', 'palace'], required_words=['code', 'palace'])

    # Longer responses
    response(long.R_ADVICE, ['give', 'advice'], required_words=['advice'])
    response(long.R_EATING, ['what', 'you', 'eat'], required_words=['you', 'eat'])

    best_match = max(highest_prob_list, key=highest_prob_list.get)
    # print(highest_prob_list)
    # print(f'Best match = {best_match} | Score: {highest_prob_list[best_match]}')

    return long.unknown() if highest_prob_list[best_match] < 1 else best_match


# Used to get the response
def get_response(user_input):
    split_message = re.split(r'\s+|[,;?!.-]\s*', user_input.lower())
    response = check_all_messages(split_message)
    return response


# Testing the response system
while True:
    print('Bot: ' + get_response(input('You: ')))