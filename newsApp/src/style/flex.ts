import { StyleSheet } from 'react-native';

export const flexBox = StyleSheet.create({
    dFlex: {
        display: 'flex',
    },
    flexGrow: {
        flexGrow: 1,
    },
    flexColumn: {
        flexDirection: 'column',
    },
    justifyCenter: {
        justifyContent: 'center',
    },
    justifyBetween: {
        justifyContent: 'space-between',
    },
    itemsCenter: {
        alignItems: 'center',
    },
    textAlignCenter: {
        textAlign: 'center',
    },
    flexDirectionRow: {
        flexDirection: 'row',
    },
    flexDirectionCol: {
        flexDirection: 'column',
    },
    gap4:{
        gap: 4
    },
    borderBottom:{
        borderBottomWidth: 1,
        borderBottomColor: '#c7c7c7'
    }
})