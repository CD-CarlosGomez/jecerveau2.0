Imports Microsoft.VisualBasic

Public Class f_Calificaciones
    Inherits ClasePresentacion
    Public Sub New()
        Constructor()
    End Sub
    Public Sub Constructor()
        mTablaTamaño = 7
        mTablaNombre = "calificaciones"
        mTablaCampos = New ClaseCampos(mTablaTamaño)

        'campo idCalificacion
        mTablaCampos.PonerValor(0, "0") 'campo codigo Valor por defecto es 0
        mTablaCampos.PonerNombre(0, "idCalificacion") 'campo codigo nombre es codigo
        mTablaCampos.PonerTipo(0, TipoDato.Numero) 'campo codigo tipo de dato es numerico
        mTablaCampos.PonerKey(0, PrimaryKey.si) 'campo codigo es llave de la tabla
        'campo idUsaurio
        mTablaCampos.PonerValor(1, "0")
        mTablaCampos.PonerNombre(1, "idUsuario")
        mTablaCampos.PonerTipo(1, TipoDato.Numero)
        mTablaCampos.PonerKey(1, PrimaryKey.no)
        'campo CO
        mTablaCampos.PonerValor(2, "0")
        mTablaCampos.PonerNombre(2, "CO")
        mTablaCampos.PonerTipo(2, TipoDato.Numero)
        mTablaCampos.PonerKey(2, PrimaryKey.no)
        'campo CE
        mTablaCampos.PonerValor(3, "0")
        mTablaCampos.PonerNombre(3, "CE")
        mTablaCampos.PonerTipo(3, TipoDato.Numero)
        mTablaCampos.PonerKey(3, PrimaryKey.no)
        'campo CO
        mTablaCampos.PonerValor(4, "0")
        mTablaCampos.PonerNombre(4, "PO")
        mTablaCampos.PonerTipo(4, TipoDato.Numero)
        mTablaCampos.PonerKey(4, PrimaryKey.no)
        'campo CO
        mTablaCampos.PonerValor(5, "0")
        mTablaCampos.PonerNombre(5, "PE")
        mTablaCampos.PonerTipo(5, TipoDato.Numero)
        mTablaCampos.PonerKey(5, PrimaryKey.no)
        'Campo notaGeneral
        mTablaCampos.PonerValor(6, "0")
        mTablaCampos.PonerNombre(6, "notaGeneral")
        mTablaCampos.PonerTipo(6, TipoDato.Numero)
        mTablaCampos.PonerKey(6, PrimaryKey.no)
        'Campo resultadoFinal
        mTablaCampos.PonerValor(7, "")
        mTablaCampos.PonerNombre(7, "resultadoFinal")
        mTablaCampos.PonerTipo(7, TipoDato.Cadena)
        mTablaCampos.PonerKey(7, PrimaryKey.no)
    End Sub
    'getters y setters de la tabla
    Public Property idCalificacion() As Integer
        Get
            Return mTablaCampos.SacarValor(0)
        End Get
        Set(ByVal value As Integer)
            mTablaCampos.PonerValor(0, value)
        End Set
    End Property
    Public Property idUsuario() As Integer
        Get
            Return mTablaCampos.SacarValor(1)
        End Get
        Set(ByVal value As Integer)
            mTablaCampos.PonerValor(1, value)
        End Set
    End Property
    Public Property CO() As Integer
        Get
            Return mTablaCampos.SacarValor(2)
        End Get
        Set(ByVal value As Integer)
            mTablaCampos.PonerValor(2, value)
        End Set
    End Property
    Public Property CE() As Integer
        Get
            Return mTablaCampos.SacarValor(3)
        End Get
        Set(ByVal value As Integer)
            mTablaCampos.PonerValor(3, value)
        End Set
    End Property
    Public Property PO() As Integer
        Get
            Return mTablaCampos.SacarValor(4)
        End Get
        Set(ByVal value As Integer)
            mTablaCampos.PonerValor(4, value)
        End Set
    End Property
    Public Property PE() As Integer
        Get
            Return mTablaCampos.SacarValor(5)
        End Get
        Set(ByVal value As Integer)
            mTablaCampos.PonerValor(5, value)
        End Set
    End Property
    Public Property notaGeneral() As Integer
        Get
            Return mTablaCampos.SacarValor(6)
        End Get
        Set(ByVal value As Integer)
            mTablaCampos.PonerValor(6, value)
        End Set
    End Property
    Public Property resultadoFinal() As String
        Get
            Return mTablaCampos.SacarValor(7)
        End Get
        Set(ByVal value As String)
            mTablaCampos.PonerValor(7, value)
        End Set
    End Property
End Class
