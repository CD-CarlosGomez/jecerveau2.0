Imports Microsoft.VisualBasic

Public Class usuarios
    Inherits ClasePresentacion
    'constructor  de la clasePersona
    Public Sub New()
        Contructor()
    End Sub
    Public Sub Contructor()
        mTablaTamaño = 6 'esta tabla tiene 3 campos(codigo,nombre,estado) por eso vale 2
        mTablaNombre = "usuarios" 'nombre de la tabla Sacado de la Base de datos
        mTablaCampos = New ClaseCampos(mTablaTamaño) 'número de campos de la tabla para dimencionar el array

        'los siguientes campos son sacados de la tabla
        'campo idUsuario
        mTablaCampos.PonerValor(0, "0") 'campo codigo Valor por defecto es 0
        mTablaCampos.PonerNombre(0, "idUsuario") 'campo codigo nombre es codigo
        mTablaCampos.PonerTipo(0, TipoDato.Numero) 'campo codigo tipo de dato es numerico
        mTablaCampos.PonerKey(0, PrimaryKey.no) 'campo codigo es llave de la tabla
        mTablaCampos.PonerAI(0, Autoincrementable.si)
        'campo noUsuario
        mTablaCampos.PonerValor(1, "")
        mTablaCampos.PonerNombre(1, "noUsuario")
        mTablaCampos.PonerTipo(1, TipoDato.Cadena)
        mTablaCampos.PonerKey(1, PrimaryKey.si)
        mTablaCampos.PonerAI(1, Autoincrementable.no)
        'campo nombreUsuario
        mTablaCampos.PonerValor(2, "")
        mTablaCampos.PonerNombre(2, "nombreUsuario")
        mTablaCampos.PonerTipo(2, TipoDato.Cadena)
        mTablaCampos.PonerKey(2, PrimaryKey.no)
        mTablaCampos.PonerAI(2, Autoincrementable.no)
        'campo ApellidoUsuario
        mTablaCampos.PonerValor(3, "")
        mTablaCampos.PonerNombre(3, "apellidoUsuario")
        mTablaCampos.PonerTipo(3, TipoDato.Cadena)
        mTablaCampos.PonerKey(3, PrimaryKey.no)
        mTablaCampos.PonerAI(3, Autoincrementable.no)
        'campo contraseñaUsuario
        mTablaCampos.PonerValor(4, "")
        mTablaCampos.PonerNombre(4, "contrasenaUsuario")
        mTablaCampos.PonerTipo(4, TipoDato.Cadena)
        mTablaCampos.PonerKey(4, PrimaryKey.no)
        mTablaCampos.PonerAI(4, Autoincrementable.no)
        'campo descPerfil
        mTablaCampos.PonerValor(5, "")
        mTablaCampos.PonerNombre(5, "descPerfil")
        mTablaCampos.PonerTipo(5, TipoDato.Cadena)
        mTablaCampos.PonerKey(5, PrimaryKey.no)
        mTablaCampos.PonerAI(5, Autoincrementable.no)
        'campo stUsuario
        mTablaCampos.PonerValor(6, "0")
        mTablaCampos.PonerNombre(6, "stUsuario")
        mTablaCampos.PonerTipo(6, TipoDato.Numero)
        mTablaCampos.PonerKey(6, PrimaryKey.no)
        mTablaCampos.PonerAI(6, Autoincrementable.no)
        'MessageBox.Show(mCamposTabla(0, 0) & " # " & mCamposTabla(0, 1))=0#
    End Sub
    'campos de la tabla getters y setters
    Public Property idUsuario() As Integer
        Get
            Return mTablaCampos.SacarValor(0)
        End Get
        Set(ByVal value As Integer)
            mTablaCampos.PonerValor(0, value)
        End Set
    End Property
    Public Property noUsuario() As String
        Get
            Return mTablaCampos.SacarValor(1)
        End Get
        Set(ByVal value As String)
            mTablaCampos.PonerValor(1, value)
        End Set
    End Property
    Public Property nombreUsuario() As String
        Get
            Return mTablaCampos.SacarValor(2)
        End Get
        Set(ByVal value As String)
            mTablaCampos.PonerValor(2, value)
        End Set
    End Property
    Public Property apellidoUsuario() As String
        Get
            Return mTablaCampos.SacarValor(3)
        End Get
        Set(ByVal value As String)
            mTablaCampos.PonerValor(3, value)
        End Set
    End Property
    Public Property contrasenaUsuario() As String
        Get
            Return mTablaCampos.SacarValor(4)
        End Get
        Set(ByVal value As String)
            mTablaCampos.PonerValor(4, value)
        End Set
    End Property
    Public Property descPerfil() As String
        Get
            Return mTablaCampos.SacarValor(5)
        End Get
        Set(ByVal value As String)
            mTablaCampos.PonerValor(5, value)
        End Set
    End Property
    Public Property stUsuario() As Integer
        Get
            Return mTablaCampos.SacarValor(6)
        End Get
        Set(ByVal value As Integer)
            mTablaCampos.PonerValor(6, value)
        End Set
    End Property
End Class