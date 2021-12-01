import os
import time


def win(board, player):
    printBoard(board,player)
    input("\x1b[6;30;42mPLAYER \x1b[0m\x1b[1;33;42m"+str(player)+"\x1b[0m\x1b[6;30;42m HAS WON PRESS \x1b[0m\x1b[1;33;42m[ENTER]\x1b[0m\x1b[6;30;42m FOR EXIT\x1b[0m")


def main(board,player):
    while(checkWinner(board)):
        printBoard(board,player)
        askMove(player,board)
        if(player == 1):
            player = 2;
        else:
            player = 1
        
def askMove(player,board):
    x = ''
    if(player == 1):
        x = input('Turn Player 1 (1-7): ')
    else:
         x = input('Turn Player 2 (1-7): ')
    try:
        if(int(x) >= 1 and int(x)<=7):
            move(x,player,board)
        else:
            os.system("clear")
            print('\x1b[6;30;41m                                                   \x1b[0m')
            print('\x1b[6;30;41m !! ILEGAL CHARACTER PRESS [ENTER] FOR CONTINUE !! \x1b[0m')
            print('\x1b[6;30;41m                                                   \x1b[0m')
            input()
    except:
        os.system("clear")
        print('\x1b[6;30;41m                                                   \x1b[0m')
        print('\x1b[6;30;41m !! ILEGAL CHARACTER PRESS [ENTER] FOR CONTINUE !! \x1b[0m')
        print('\x1b[6;30;41m                                                   \x1b[0m')
        input()

def move(x,player, board):
    g = 5
    f = 0
    x = int(x)
    for i in range(5):
        if(board[g][(x-1)] == 0):
            f = g
            break
        g = g-1
    
    t = 0
    for i in range(5):
        board[t][(x-1)] = player
        printBoard(board, player)
        time.sleep(0.2)
        board[t][(x-1)] = 0
        if(f == t+1):
            board[g][(x-1)] = player
            time.sleep(0.2)
            break
        t = t+1
    

def printBoard(board, player):
    os.system("clear")
    print('\x1b[6;30;42m                               \x1b[0m')
    print('\x1b[6;30;42m ┌───────────────────────────┐ \x1b[0m')
    if(player == 1):
        print('\x1b[6;30;42m │     P L A Y E R   1   \x1b[0m\x1b[0;31;42m●\x1b[0m\x1b[6;30;42m   │ \x1b[0m')
    else:
        print('\x1b[6;30;42m │     P L A Y E R   2   ●   │ \x1b[0m')
    print('\x1b[6;30;42m └───────────────────────────┘ \x1b[0m')
    for i in board:
        t = '\x1b[6;30;42m │ \x1b[0m'
        count = 0
        for g in i:
            if(g == 0):
                t+= '\x1b[6;30;42m  │ \x1b[0m'
            else: 
                if(g == 1):
                    t += '\x1b[0;31;42m●\x1b[0m\x1b[6;30;42m │ \x1b[0m'
                else:
                    t += '\x1b[0;30;42m●\x1b[0m\x1b[6;30;42m │ \x1b[0m'
            count = count+1
        print('\x1b[6;30;42m ├───┼───┼───┼───┼───┼───┼───┤ \x1b[0m')
        print('\x1b[6;30;42m'+t+'\x1b[0m')
    print('\x1b[6;30;42m └───┴───┴───┴───┴───┴───┴───┘ \x1b[0m')

         


def checkWinner(board):
    """ Horizontal jugaor 1 """
    for i in range(6):
        x = 0
        for g in range(7):
            if board[i][g] == 1:
                x = x+1
                if(x == 4):
                    win(board, player)
                    return False
            else:
                x = 0

    """ Horizontal jugaor 2 """
    for i in range(6):
        x = 0
        for g in range(7):
            if board[i][g] == 2:
                x = x+1
                if(x == 4):
                    win(board, player+1)
                    return False
            else:
                x = 0

    """ Vertical jugaor 1 """
    for i in range(7):
        x = 0
        for g in range(6):
            if board[g][i] == 1:
                x = x+1
                if(x == 4):
                    win(board, player)
                    return False
            else:
                x = 0

        """ Vertical jugaor 2 """
        for i in range(7):
            x = 0
            for g in range(6):
                if board[g][i] == 2:
                    x = x+1
                    if(x == 4):
                        win(board, player+1)
                        return False
                else:
                    x = 0
        """ Diagonal (\) jugaor 1 """
        t = -3
        for i in range(7):
            x = 0
            for g in range(7):
                if (t+g)>=0 and (t+g)<6 and g>=0 and g<7:
                    if(board[t+g][g] == 1):
                        x = x+1
                        if(x == 4):
                            win(board, player)
                            return False
                else:
                    x = 0
            t = t+1
        """ Diagonal (\) jugaor 2 """
        t = -3
        for i in range(7):
            x = 0
            for g in range(7):
                if (t+g)>=0 and (t+g)<6 and g>=0 and g<7:
                    if(board[t+g][g] == 2):
                        x = x+1
                        if(x == 4):
                            win(board, player+1)
                            return False
                else:
                    x = 0
            t = t+1

        """ Diagonal (/) jugaor 1 """
        t = 3
        for i in range(8):
            x = 0
            for g in range(7):
                if (t-g)>=0 and (t-g)<6 and g>=0 and g<7:
                    if(board[t-g][g] == 1):
                        x = x+1
                        if(x == 4):
                            win(board, player)
                            return False
                else:
                    x = 0
            t = t+1


        """ Diagonal (/) jugaor 2 """
        t = 3
        for i in range(8):
            x = 0
            for g in range(7):
                if (t-g)>=0 and (t-g)<6 and g>=0 and g<7:
                    if(board[t-g][g] == 2):
                        x = x+1
                        if(x == 4):
                            win(board, player+1)
                            return False
                else:
                    x = 0
            t = t+1

    return True

board = [
    [0,0,0,0,0,0,0],
    [0,0,0,0,0,0,0],
    [0,0,0,0,0,0,0],
    [0,0,0,0,0,0,0],
    [0,0,0,0,0,0,0],
    [0,0,0,0,0,0,0],
]

player = 1
main(board, player)
    
