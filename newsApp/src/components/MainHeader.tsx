import { StyleSheet, Text, View } from 'react-native';
import Icon from 'react-native-vector-icons/Entypo'
export default function MainHeader(){
    return(
        <View style={styles.header}>
            <Text>Sunday, Dec 12, 2020</Text>
            <Icon name="menu" size={30} color="gray" />
        </View>
    )
}

const styles = StyleSheet.create({
    header: {
        display: 'flex',
        justifyContent: 'space-between',
        flexDirection: 'row',
        padding: 16,
    }
});
